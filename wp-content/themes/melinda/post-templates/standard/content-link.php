<?php
/**
 * @package melinda
 */

$ar_current_post_content = melinda_post_preview_link(get_the_content());

?>

<div class="post-standard_desc-w">
	<div class="post-standard_aside">
		<div class="post-standard_icon"><span class="icon-link"></span></div>
	</div>

	<div class="post-standard_main">
		<?php the_title( sprintf( '<header><h3 class="post-standard_h"><a href="%s" class="post-standard_lk" rel="bookmark">', esc_url( $ar_current_post_content['link'] ) ), '</a></h3></header>' ); ?>

		<div class="post-standard_desc">
			<?php echo apply_filters( 'the_content', $ar_current_post_content['link'] ); ?>
		</div>
	</div>
</div>
