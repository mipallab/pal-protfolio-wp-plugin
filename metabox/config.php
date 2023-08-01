<?php

add_action('cmb2_admin_init', 'pla_portfolio_metabox' );

function pla_portfolio_metabox(){

	/**
	 * 
	 * 	For Pla protfolio
	 * 
	 */
	$pla_cmb = new_cmb2_box(array(
		'id'			=> '_social-fields',
		'title'			=> __('Social Fields','commet'),
		'object_types'	=> array('pla-protfolio')
	));

	// facebook
	$pla_cmb -> add_field(array(
		'name'			=> __('Facebook Profile Link' ,'commet'),
		'id'			=> '_fb-url',
		'type'			=> 'text',
		'desc'			=> __('add facebook url here.','commet'),
		'default'		=> 'https://www.facebook.com/'
	));

	// whatsapp
	$pla_cmb -> add_field(array(
		'name'			=> __('What\'s app Busines number' ,'commet'),
		'id'			=> '_whatsapp-number',
		'type'			=> 'text',
		'desc'			=> __('add whats app business number here.','commet'),
		'default'		=> '+8801xxxxxxxx'
	));

	// instagram
	$pla_cmb -> add_field(array(
		'name'			=> __('Instagram Profile Link' ,'commet'),
		'id'			=> '_instagram-url',
		'type'			=> 'text',
		'desc'			=> __('add instagram url here.','commet'),
		'default'		=> 'https://www.instagram.com/'
	));

}