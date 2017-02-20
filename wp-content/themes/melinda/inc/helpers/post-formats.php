<?php
/*
 * Called by our templates to display the preview
 */

function melinda_post_preview_gallery($current_post_content = '') {

	// Get the first [melinda_gallery] or [gallery] shortcode and if found it...
	if (preg_match("!\[gallery.*?\]!", $current_post_content, $match_gallery)) {

		echo do_shortcode($match_gallery[0]);

		// Removes gallery shortcode from original content
		$current_post_content = str_replace($match_gallery[0], "", $current_post_content);
	}

	return melinda_esc_post_preview($current_post_content);
}


function melinda_post_preview_link($current_post_content = '') {

	// Try find URL at start of content and extract it
	if (preg_match('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', $current_post_content, $match_link)) {
		// Define title URL as being the extracted URL
		// $current_post_content['title_href'] = $link[0];
		// Remove link from content
		$current_post_content = str_replace($match_link[0], "", $current_post_content);
	}

	$return = array(
		'content' => melinda_esc_post_preview($current_post_content),
		'link' => isset($match_link[0]) ? $match_link[0] : esc_url(get_permalink()),
	);

	return $return;
}


function melinda_post_preview_image($img_size = 'rectangle_medium__crop', $img_class = '') {
	if (has_post_thumbnail()) {
		?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="<?php echo esc_attr($img_class); ?>-lk">
			<?php the_post_thumbnail( $img_size, array('title' => get_the_title(), 'class' => $img_class) ); ?>
		</a><?php
	}
}


function melinda_post_preview_video($current_post_content = '') {

	// Wraps video URLs in [embed] tags
	$current_post_content = preg_replace('|^\s*(https?://[^\s"]+)\s*$|im', "[embed]$1[/embed]", $current_post_content);

	// Find a [embed] or [video] shortcode in the content and extract it. If found a video inside content, take the first and extract
	if (preg_match("!\[embed.+?\]|\[video.+?\]\[\/video\]|\[playlist.+?\]!", $current_post_content, $match_video)) {

		global $wp_embed;

		// Display Video
		echo '<div class="post-video">'. do_shortcode($wp_embed->run_shortcode($match_video[0])) . '</div>';

		// Removes video from content
		$current_post_content = str_replace($match_video[0], "", $current_post_content);
	}

	return melinda_esc_post_preview($current_post_content);
}


function melinda_post_preview_audio($current_post_content = '') {

	// Wraps audio URLs in [embed] tags
	$current_post_content = preg_replace('|^\s*(https?://[^\s"]+)\s*$|im', "[embed]$1[/embed]", $current_post_content);

	// Find a [embed] or [audio] shortcode in the content and extract it. If found a audio inside content, take the first and extract
	if (preg_match("!\[embed.+?\]|\[audio.+?\](?:\[\/audio\])?|\[playlist.+?\]!", $current_post_content, $match_audio)) {

		global $wp_embed;

		// Display audio
		echo '<div class="post-audio">'. do_shortcode($wp_embed->run_shortcode($match_audio[0])) . '</div>';

		// Removes audio from content
		$current_post_content = str_replace($match_audio[0], "", $current_post_content);
	}

	return melinda_esc_post_preview($current_post_content);
}


function melinda_esc_post_preview($current_post_content = '') {

	$current_post_content = strip_shortcodes($current_post_content);

	// Try find URL at start of content and extract it
	if (preg_match('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', $current_post_content, $match_link)) {
		// Define title URL as being the extracted URL
		// $current_post_content['title_href'] = $link[0];
		// Remove link from content
		$current_post_content = str_replace($match_link[0], "", $current_post_content);
	}

	return wp_kses($current_post_content, array());
}
