<?php
/**
 * @package melinda
 */
?>

<div class="post-standard_desc-w">
	<div class="post-standard_aside">
		<div class="post-standard_icon"><span class="icon-check"></span></div>
	</div>

	<div class="post-standard_main">
		<blockquote class="post-standard_desc"><?php echo apply_filters( 'the_content', melinda_esc_post_preview(get_the_content()) ); ?></blockquote>
	</div>
</div>
