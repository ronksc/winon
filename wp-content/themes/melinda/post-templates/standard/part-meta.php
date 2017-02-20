<?php
/**
 * @package melinda
 */
?>

<div class="post-standard_meta">
	<?php // @todo if (get_theme_option('posts--author')) { ?>
		<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" class="post-standard_author-lk">
			<div class="post-standard_author-img"><?php echo get_avatar(get_the_author_meta('email') , 100); ?></div>
			<div class="post-standard_author-h">
				<span class="post-standard_author-by"><?php esc_html_e("Posted by", 'melinda'); ?></span>
				<span class="post-standard_author-name"><?php the_author(); ?></span>
			</div>
		</a>
	<?php // } ?>

	<?php if (!post_password_required() && comments_open() && get_comments_number() != 0) { ?>
		<a href="<?php comments_link(); ?>" class="post-standard_comments">
			<span class="icon-speech-bubble"></span>
			<span class="post-standard_comments-count"><?php comments_number('', '1', '%'); ?></span>
		</a>
	<?php } ?>
</div>
