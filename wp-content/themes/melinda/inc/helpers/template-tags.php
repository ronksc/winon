<?php
// don't load directly
if (!defined('ABSPATH')) die('-1');

function get_theme_option($id = false, $local_prefix = true) {
	if (!$id) {
		return false;
	}

	global $melinda_options;

	$value = false;

	if (isset($melinda_options[$id]) && $melinda_options[$id] != '') {
		$value = $melinda_options[$id];
	}

	$post_type = get_post_type();
	$single_option_name = 'single_'.$post_type.'--'.$id;
	$archive_option_name = $post_type.'s--'.$id;
	$search_option_name = 'search--'.$id;

	if (is_singular()) {

		if (isset($melinda_options[$single_option_name])) {
			$_value = $melinda_options[$single_option_name];

			if (is_array($_value)) {
				unset($_value['media']);
				unset($_value['google']);
				unset($_value['border-style']);
				foreach ($_value as $key => $item) {
					if ($item != '' && $item != 'px') {
						$value[$key] = $item;
					}
				}
				return $value;
			}

			if ($_value != '' && $_value != null) {
				$value = $_value;
			}
		}

		if (function_exists('redux_post_meta')) {
			$prefix = '';
			if ($local_prefix) {
				$prefix = 'local_';
			}
			$metaboxes = redux_post_meta("melinda_options", get_the_ID());
			if (isset($metaboxes[$prefix . $id])) {
				$_value = $metaboxes[$prefix . $id];

				if (is_array($_value)) {
					unset($_value['media']);
					unset($_value['google']);
					unset($_value['border-style']);
					foreach ($_value as $key => $item) {
						if ($item != '' && $item != 'px') {
							$value[$key] = $item;
						}
					}
					return $value;
				}

				if ($_value != '' && $_value != null) {
					$value = $_value;
				}
			}
		}

	} elseif (!is_search() && isset($melinda_options[$archive_option_name])) {

		$_value = $melinda_options[$archive_option_name];

		if (is_array($_value)) {
			unset($_value['media']);
			unset($_value['google']);
			foreach ($_value as $key => $item) {
				if ($item != '') {
					$value[$key] = $item;
				}
			}
			return $value;
		}

		if ($_value != '' && $_value != null) {
			$value = $_value;
		}

	} elseif (is_search() && isset($melinda_options[$search_option_name])) {

		$_value = $melinda_options[$search_option_name];

		if (is_array($_value)) {
			unset($_value['media']);
			unset($_value['google']);
			foreach ($_value as $key => $item) {
				if ($item != '') {
					$value[$key] = $item;
				}
			}
			return $value;
		}

		if ($_value != '' && $_value != null) {
			$value = $_value;
		}

	}

	return $value;
}


function melinda_post_meta($option) {
	if (function_exists('redux_post_meta')) {
		return redux_post_meta("melinda_options", get_the_ID(), $option);
	}
	return false;
}


function get_logo() {
	$logo = '';
	$logo = get_theme_option('header--logo_dark');
	$logo_retina = '';
	$logo_retina = get_theme_option('header--logo_dark_retina');
	$retina = is_array($logo_retina) && $logo_retina['url'] ? true : false;

	$logo_light = '';
	$logo_light = get_theme_option('header--logo_light');
	$logo_light_retina = '';
	$logo_light_retina = get_theme_option('header--logo_light_retina');
	$retina_light = is_array($logo_light_retina) && $logo_light_retina['url'] ? true : false;

	if ((is_array($logo) && $logo['url']) || (is_array($logo_light) && $logo_light['url'])) {
		?>
		<div class="logo-w __dark" style="width:<?php echo esc_attr($logo['width']); ?>px">
			<a href="<?php echo esc_url(home_url('/')); ?>">
				<img class="logo <?php if ($retina) { ?>__not-retina<?php } ?>" alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($logo['url']); ?>">
				<?php if ($retina) {
					?><img class="logo __retina" alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($logo_retina['url']); ?>"><?php
				} ?>
			</a>
		</div>
		<?php if (get_theme_option('header--color_scheme') == 'light') { ?>
			<div class="logo-w __light" style="width:<?php echo esc_attr($logo_light['width']); ?>px">
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<img class="logo <?php if ($retina_light) { ?>__not-retina<?php } ?>" alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($logo_light['url']); ?>">
					<?php if ($retina_light) {
						?><img class="logo __retina" alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($logo_light_retina['url']); ?>"><?php
					} ?>
				</a>
			</div>
		<?php }
	} else {
		?>
		<div class="logo-w">
			<a href="<?php echo esc_url(home_url('/')); ?>" class="logo_tx"><?php bloginfo('name'); ?></a>
		</div>
		<?php
	}
}


function is_negative_header() {
	// DO NOT USE IN LOOP OR AFTER LOOP
	if (
		(get_post_type() == 'product' && (is_singular() || (!is_singular() && !is_title_wrapper()))) ||
		(function_exists('is_account_page') && is_account_page() && !is_user_logged_in()) ||
		(!is_home() && get_post_type() == 'post' && !is_title_wrapper()) ||
		!get_theme_option('header--negative_height') ||
		is_404() ||
		!have_posts()
	) {
		return false;
	}
	return true;
}


function is_title_wrapper() {
	if (
		is_404() ||
		is_singular(array('product')) ||
		(function_exists('is_account_page') && is_account_page() && !is_user_logged_in())
	) {
		return false;
	}
	return get_theme_option('title_wrapper');
}


function get_sidebar_location() {
	$sidebar_location = get_theme_option('layout--sidebars');
	if (
		is_404() ||
		$sidebar_location == 'without' ||
		($sidebar_location == 'left' && !is_active_sidebar('sidebar_left')) ||
		($sidebar_location == 'right' && !is_active_sidebar('sidebar_right')) ||
		(
			($sidebar_location == 'both' || $sidebar_location == 'both_left' || $sidebar_location == 'both_right') &&
			(!is_active_sidebar('sidebar_left') || !is_active_sidebar('sidebar_right'))
		)
	) {
		return false;
	}
	return $sidebar_location;
}


function get_responsive_column_classes($columns = 1, $loop = false, $double = false, $expanded = true, $overwrite_expanded = true) {

	$classes = array();

	if ($overwrite_expanded) {
		$expanded = $expanded && get_theme_option('layout--content_width') == 'expanded';
	}

	if (
		$expanded &&
		(!is_melinda_shop() || (is_melinda_shop() && (is_shop() || is_product_taxonomy())))
	) {

		if ($double) {
			if ($columns == 2) {
				$classes[] = 'col-xs-12 col-xxl-8';
			} elseif ($columns == 3) {
				$classes[] = 'col-xs-12 col-md-8 col-xxl-6';
			} elseif ($columns == 4) {
				$classes[] = 'col-xs-12 col-sm-8 col-md-6 col-xxl-4';
			} else {
				$classes[] = 'col-xs-12';
			}
		} else {
			if ($columns == 1) {
				$classes[] = 'col-xs-12';
			} elseif ($columns == 2) {
				$classes[] = 'col-xs-12 col-md-6 col-xxl-4';
				if ($loop !== false && $loop % 2 == 0) { $classes[] = 'first-md'; }
				if ($loop !== false && $loop % 3 == 0) { $classes[] = 'first-xxl'; }
			} elseif ($columns == 3) {
				$classes[] = 'col-xs-12 col-sm-6 col-md-4 col-xxl-3';
				if ($loop !== false && $loop % 2 == 0) { $classes[] = 'first-sm'; }
				if ($loop !== false && $loop % 3 == 0) { $classes[] = 'first-md'; }
				if ($loop !== false && $loop % 4 == 0) { $classes[] = 'first-xxl'; }
			} elseif ($columns == 4) {
				$classes[] = 'col-xs-12 col-sm-4 col-md-3 col-xxl-2';
				if ($loop !== false && $loop % 3 == 0) { $classes[] = 'first-sm'; }
				if ($loop !== false && $loop % 4 == 0) { $classes[] = 'first-md'; }
				if ($loop !== false && $loop % 6 == 0) { $classes[] = 'first-xxl'; }
			} else {
				$classes[] = 'col-xs-6 col-sm-3 col-md-2';
				if ($loop !== false && $loop % 4 == 0) { $classes[] = 'first-sm'; }
				if ($loop !== false && $loop % 6 == 0) { $classes[] = 'first-md'; }
			}
		}

	} else {

		if ($double) {
			if ($columns == 3) {
				$classes[] = 'col-xs-12 col-md-8';
			} elseif ($columns == 4) {
				$classes[] = 'col-xs-12 col-sm-8 col-md-6';
			} else {
				$classes[] = 'col-xs-12';
			}
		} else {
			if ($columns == 1) {
				$classes[] = 'col-xs-12';
			} elseif ($columns == 2) {
				$classes[] = 'col-xs-12 col-md-6';
				if ($loop !== false && $loop % 2 == 0) { $classes[] = 'first-md first-xxl'; }
			} elseif ($columns == 3) {
				$classes[] = 'col-xs-12 col-sm-6 col-md-4';
				if ($loop !== false && $loop % 2 == 0) { $classes[] = 'first-sm'; }
				if ($loop !== false && $loop % 3 == 0) { $classes[] = 'first-md first-xxl'; }
			} elseif ($columns == 4) {
				$classes[] = 'col-xs-12 col-sm-4 col-md-3';
				if ($loop !== false && $loop % 3 == 0) { $classes[] = 'first-sm'; }
				if ($loop !== false && $loop % 4 == 0) { $classes[] = 'first-md first-xxl'; }
			} else {
				$classes[] = 'col-xs-6 col-sm-3 col-md-2';
				if ($loop !== false && $loop % 4 == 0) { $classes[] = 'first-sm'; }
				if ($loop !== false && $loop % 6 == 0) { $classes[] = 'first-md first-xxl'; }
			}
		}

	}

	return $classes;

}


function get_dynamic_area($id) {
	if($id) {
		$page = get_post($id);
		if ($page) {
			echo '<div class="container">';
			echo apply_filters('the_content', $page->post_content);
			echo '</div>';

			// Display custom row CSS by VC
			$vc_styles = get_post_meta($id, '_wpb_shortcodes_custom_css', true);
			if($vc_styles !== '') {
				echo '<style>' . $vc_styles .'</style>';
			}
		}
	}
}


/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package melinda
 */

function melinda_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) { ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php esc_html_e( 'Pingback:', 'melinda' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( 'Edit', 'melinda' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php } else { ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<div class="clearfix">
				<div class="comment-avatar-w">
					<div class="comment-avatar"><?php echo get_avatar( $comment, 70 ); ?></div>
				</div>
				<div class="comment-content-w">
					<footer class="comment-meta">
						<div class="vcard">

							<h6 class="fn comment-author"><?php echo get_comment_author_link(); ?></h6>

							<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" class="comment-date">
								<time datetime="<?php comment_time( 'c' ); ?>">
									<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'melinda' ), get_comment_date(), get_comment_time() ); ?>
								</time>
							</a>
							<?php edit_comment_link( esc_html__('Edit', 'melinda') ); ?>

						</div><!-- .comment-author -->

						<?php if ( '0' == $comment->comment_approved ) { ?>
						<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'melinda' ); ?></p>
						<?php } ?>
					</footer><!-- .comment-meta -->

					<div class="comment-content">
						<?php comment_text(); ?>
					</div><!-- .comment-content -->

					<?php
						comment_reply_link( array_merge( $args, array(
							'add_below' => 'div-comment',
							'depth'	 => $depth,
							'max_depth' => $args['max_depth'],
							'before'	=> '<div class="comment-reply">',
							'after'	 => '</div>',
							'reply_text'=> esc_html__('Leave reply', 'melinda'),
						) ) );
					?>
				</div>
			</div>
		</article>

	<?php
	}
}


add_filter('comment_form_default_fields', 'melinda_comment_form_fields');
function melinda_comment_form_fields($fields) {
	$commenter = wp_get_current_commenter();

	$fields['author'] =
		'<div class="row"><div class="comment-form-field comment-form-author col-sm-4">
			<label for="author">' . esc_html__('Your name', 'melinda') . '*</label>
			<input required minlength="3" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '">
		</div>';

	$fields['email'] =
		'<div class="comment-form-field comment-form-email col-sm-4">
			<label for="email">' . esc_html__('Your email', 'melinda') . '*</label>
			<input required id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '">
		</div>';

	$fields['url'] =
		'<div class="comment-form-field comment-form-url col-sm-4">
			<label for="url">' . esc_html__('Your website', 'melinda') . '</label>
			<input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '">
		</div></div>';

	return $fields;
}


function melinda_posts_navigation($post_type = 'posts') {
	if ( $GLOBALS['wp_query']->max_num_pages < 2 || !get_theme_option($post_type . '--nav')) {
		return;
	}
	?>
	<nav class="navigation posts-nav" role="navigation">
		<ul class="posts-nav-lst">
			<?php if (get_next_posts_link()) { ?>
				<li class="posts-nav-prev"><span class="icon-arrow-left posts-nav-prev_ic"></span><?php
					if ($post_type == 'projects') {
						next_posts_link( esc_html__('Older projects', 'melinda') );
					} else {
						next_posts_link( esc_html__('Older posts', 'melinda') );
					}
				?></li>
			<?php } ?>
			<?php if (get_previous_posts_link()) { ?>
				<li class="posts-nav-next"><span class="icon-arrow-right posts-nav-next_ic"></span><?php
					if ($post_type == 'projects') {
						previous_posts_link( esc_html__('Newer projects', 'melinda') );
					} else {
						previous_posts_link( esc_html__('Newer posts', 'melinda') );
					}
				?></li>
			<?php } ?>
		</ul>
	</nav>
	<?php
}


function melinda_post_navigation($fixed = false) {
	$classes = '';

	if ($fixed) {
		$prev = get_previous_post_link(
			'<li class="post-nav-prev __fixed">%link</li>',
			'<span class="icon-arrow-left post-nav-prev_ic"></span><span class="post-nav-prev_desc">' . esc_html__('Previous reading', 'melinda') . '</span><span class="post-nav-prev_h">%title</span>'
		);
		$next = get_next_post_link(
			'<li class="post-nav-next __fixed">%link</li>',
			'<span class="icon-arrow-right post-nav-next_ic"></span><span class="post-nav-next_desc">' . esc_html__('Next reading', 'melinda') . '</span><span class="post-nav-next_h">%title</span>'
		);
		$classes = '__fixed';
	} else {
		$prev = get_previous_post_link(
			'<li class="post-nav-prev">%link</li>',
			'<span class="icon-arrow-left post-nav-prev_ic"></span><span class="post-nav-prev_desc">' . esc_html__('Previous reading', 'melinda') . '</span><span class="post-nav-prev_h">%title</span>'
		);
		$next = get_next_post_link(
			'<li class="post-nav-next">%link</li>',
			'<span class="icon-arrow-right post-nav-next_ic"></span><span class="post-nav-next_desc">' . esc_html__('Next reading', 'melinda') . '</span><span class="post-nav-next_h">%title</span>'
		);
	}

	if (!$next && !$prev) {
		return;
	}
	?>
	<nav class="navigation post-nav <?php echo esc_attr($classes); ?>" role="navigation">
		<ul class="post-nav-lst">
			<?php echo wp_kses($prev, 'post'); ?>
			<?php echo wp_kses($next, 'post'); ?>
		</ul>
	</nav>
	<?php
}


/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function melinda_search_meta() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr(get_the_date('c')),
		esc_html(get_the_date())
	);

	$posted_on = sprintf(_x( 'On %s', 'post date', 'melinda' ), $time_string);

	$byline = sprintf(
		_x( 'by %s', 'post author', 'melinda' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html(get_the_author()) . '</a></span>'
	);

	echo '<a href="' . esc_url(get_permalink()) . '" class="posted-on">' . $posted_on . '</a> <span class="byline"> ' . $byline . '</span>';
}


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function melinda_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'melinda_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields' => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number' => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'melinda_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so melinda_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so melinda_categorized_blog should return false.
		return false;
	}
}


/**
 * Flush out the transients used in melinda_categorized_blog.
 */
add_action( 'edit_category', 'melinda_category_transient_flusher' );
add_action( 'save_post', 'melinda_category_transient_flusher' );
function melinda_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'melinda_categories' );
}


/**
 * Add description to menus.
 */
add_filter('nav_menu_item_args', 'melinda_nav_menu_item_args', 99, 3);
function melinda_nav_menu_item_args($args, $item, $depth) {
	$description = $item->description;
	if ($description) {
		$args->link_after = '<span class="menu-item-desc">' . $description . '</span>';
	} else {
		$args->link_after = '';
	}
	return $args;
}
