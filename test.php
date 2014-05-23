<?php
/*
Plugin Name: test
Description: This plugins is used to test the auto update via github
Plugin URI: http://rajakannan.com
Author: Raja Kannan
Author URI: http://rajakannan.com
Version: 0.1
License: GPL2
Text Domain: /language
*/

/*

    Copyright (C) 2014  rajacse10@gmail.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action( 'admin_menu', 'rjMapLoadAdminMenu' );

function rjMapLoadAdminForm(){
    echo "Hi there";
}

function rjMapLoadAdminMenu(){
    add_menu_page('Test Plugin', 'Test Plugin', 'administrator', __FILE__, 'rjMapLoadAdminForm');
}


if ( is_admin() ) {

	define( 'TEST_SOFTWARE_SLUG', plugin_basename( __FILE__ ) );
	define( 'TEST_SOFTWARE_PROPER_NAME', 'test-plugin' );
	define( 'TEST_SOFTWARE_GITHUB_URL', 'https://github.com/rajakannan/test' );
	define( 'TEST_SOFTWARE_GITHUB_ZIP_URL', 'https://github.com/rajakannan/test/zipball/master' );
	define( 'TEST_SOFTWARE_GITHUB_API_URL', 'https://api.github.com/repos/rajakannan/test' );
	define( 'TEST_SOFTWARE_GITHUB_RAW_URL', 'https://raw.github.com/rajakannan/test/master' );
	define( 'TEST_SOFTWARE_REQUIRES_WP', '3.9' );
	define( 'TEST_SOFTWARE_TESTED_WP', '3.9' );

	include_once( 'inc/_updater.php' );
	$config = array(
		'slug' => TEST_SOFTWARE_SLUG,
		'proper_folder_name' => TEST_SOFTWARE_PROPER_NAME,
		'api_url' => TEST_SOFTWARE_GITHUB_API_URL,
		'raw_url' => TEST_SOFTWARE_GITHUB_RAW_URL,
		'github_url' => TEST_SOFTWARE_GITHUB_URL,
		'zip_url' => TEST_SOFTWARE_GITHUB_ZIP_URL,
		'requires' => TEST_SOFTWARE_REQUIRES_WP,
		'tested' => TEST_SOFTWARE_TESTED_WP,
		'readme' => 'README.md',
	);
	$github_updater = new wp_github_updater( $config );
}
