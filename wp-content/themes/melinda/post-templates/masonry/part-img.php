<?php
/**
 * @package melinda
 */


?><div class="post-masonry_img-w"><?php
	if (has_post_thumbnail()) {
			the_post_thumbnail( get_theme_option('posts--img_size'), array('title' => get_the_title(), 'class' => 'post-masonry_img') );
	}
?></div><?php
