<?php
// Background Patterns Reader
$background_patterns_path = get_template_directory() . '/images/patterns/';
$background_patterns_url = get_template_directory_uri() . '/images/patterns/';
$background_patterns = array();

if ( is_dir( $background_patterns_path ) ) {

	if ( $background_patterns_dir = opendir( $background_patterns_path ) ) {
		$background_patterns = array();

		while ( ( $background_patterns_file = readdir( $background_patterns_dir ) ) !== false ) {

			if ( stristr( $background_patterns_file, '.png' ) !== false || stristr( $background_patterns_file, '.jpg' ) !== false ) {
				$name = explode( '.', $background_patterns_file );
				$name = str_replace( '.' . end( $name ), '', $background_patterns_file );
				$background_patterns[] = array(
					'alt' => $name,
					'img' => $background_patterns_url . $background_patterns_file,
				);
			}
		}
	}
}