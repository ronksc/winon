<?php
/**
 * @package melinda
 */

// don't load directly
if (!defined('ABSPATH')) die('-1');

$css = $atts['css'] ? $atts['css'] : '';
$ex_class = $atts['ex_class'] ? ' ' . str_replace('.', '', $atts['ex_class']) : '';

$container_classes = vc_shortcode_custom_css_class($css, ' ') . $ex_class;

$grid_id = esc_attr(str_replace(':', '_', $atts['grid_id']));

?>

<div class="vc_clearfix"><div class="vc_clearfix wpb_content_element<?php echo esc_attr($container_classes); ?>">
	<div id="<?php echo $grid_id; ?>" class="
		team-member
		<?php echo esc_attr($atts['txt_position']); ?>
		<?php echo esc_attr($atts['color_scheme']); ?>
		<?php echo esc_attr($atts['boxed']); ?>
	">
		<div class="team-member_img-w" style="background-color:<?php echo esc_attr($atts['img_overlay_color']); ?>;">
			<img
				src="<?php
					$attachment_image_src = wp_get_attachment_image_src(absint($atts['img']), $atts['img_size']);
					echo esc_url($attachment_image_src[0]);
				?>"
				alt="<?php echo esc_attr($atts['title']); ?>"
				class="team-member_img <?php echo esc_attr($atts['img_scale']); ?> <?php echo esc_attr($atts['img_filter']); ?>"
			>
			<?php if ($atts['img_overlay'] != '') { ?>
				<div class="team-member_img-overlay <?php echo esc_attr($atts['img_overlay']); ?>"></div>
			<?php } ?>
		</div>
		<div class="team-member_cnt <?php echo esc_attr($atts['txt_align']); ?> <?php echo esc_attr($atts['txt_vertical_align']); ?>">
			<h5 class="team-member_name"><?php echo esc_attr($atts['title']); ?></h5>
			<div class="team-member_job"><?php echo esc_attr($atts['job']); ?></div>
			<?php if ($content != '' && $atts['txt_position'] == '') { ?>
				<div class="team-member_desc"><?php echo wpb_js_remove_wpautop($content, true); ?></div>
			<?php } ?>
			<?php
			$social_links = get_social_links();
			$output_social_links = '';
			foreach ($social_links as $id => $icon_and_name) {
				if ($atts[$id] != '') {
					$output_social_links .= '<a href="' . esc_url($atts[$id]) . '" class="team-member_soc-lk __' . esc_attr($id) . '"><i class="fa fa-' . esc_attr($id) . '"></i></a>';
				}
			}
			if ($output_social_links != '') {
				echo '<div class="team-member_soc ' . ($atts['brand_colors'] ? '__brand-colors' : '') . '">' . $output_social_links . '</div>';
			}
			?>
		</div>
	</div>
</div></div>
