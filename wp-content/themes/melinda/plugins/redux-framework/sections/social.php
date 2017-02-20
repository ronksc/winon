<?php
$social_links = get_social_links();
$redux_social_links = array();
foreach ($social_links as $id => $icon_and_name) {
	$redux_social_links[] = array(
		'id' => 'social--' . $id,
		'type' => 'text',
		'title' => $icon_and_name,
	);
}

Redux::setSection( $opt_name, array(
	'id' => 'sec_social',
	'title' => esc_html__('Social links', 'melinda'),
	'icon' => 'el el-bullhorn',
	'fields' => $redux_social_links,
) );