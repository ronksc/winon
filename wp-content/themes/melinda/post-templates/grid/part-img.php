<?php
/**
 * @package melinda
 */

$double_width = melinda_post_meta('local_single_post--double_width');

$post_format = get_post_format();

if ($double_width || $post_format == 'image') {
?>

	<div class="post-grid_img-w">
		<?php
		if (has_post_thumbnail()) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id(), get_theme_option('posts--img_size') );
			?><div class="post-grid_img" style="background-image:url(<?php echo esc_url($image[0]); ?>)"></div><?php
		}
		?>
	</div>

<?php } else { ?>

	<div class="
		post-grid_img-w
		<?php if (has_post_thumbnail()) { ?>
			js--post-grid-with-img
		<?php } else { ?>
			js--post-grid-without-img
		<?php } ?>
	">
	<?php
	if (has_post_thumbnail()) {
		the_post_thumbnail( get_theme_option('posts--img_size'), array('title' => get_the_title(), 'class' => 'post-grid_img') );
	}
	?>
	</div>

<?php } ?>
