<?php
/*
Plugin Name: WP Clean Up
Plugin URI: http://boliquan.com/wp-clean-up/
Description: WP Clean Up can help us to clean up the wordpress database. 
Version: 1.1.0
Author: BoLiQuan
Author URI: http://boliquan.com/
Text Domain: WP-Clean-Up
Domain Path: /lang
*/

function load_wp_clean_up_lang(){
	$currentLocale = get_locale();
	if(!empty($currentLocale)) {
		$moFile = dirname(__FILE__) . "/lang/wp-clean-up-" . $currentLocale . ".mo";
		if(@file_exists($moFile) && is_readable($moFile)) load_textdomain('WP-Clean-Up', $moFile);
	}
}
add_filter('init','load_wp_clean_up_lang');

function wp_clean_up($type){
	global $wpdb;
	switch($type){
		case "revision":
			$wcu_sql = "DELETE FROM $wpdb->posts WHERE post_type = 'revision'";
			$wpdb->query($wcu_sql);
			break;
		case "draft":
			$wcu_sql = "DELETE FROM $wpdb->posts WHERE post_status = 'draft'";
			$wpdb->query($wcu_sql);
			break;
		case "autodraft":
			$wcu_sql = "DELETE FROM $wpdb->posts WHERE post_status = 'auto-draft'";
			$wpdb->query($wcu_sql);
			break;
		case "moderated":
			$wcu_sql = "DELETE FROM $wpdb->comments WHERE comment_approved = '0'";
			$wpdb->query($wcu_sql);
			break;
		case "spam":
			$wcu_sql = "DELETE FROM $wpdb->comments WHERE comment_approved = 'spam'";
			$wpdb->query($wcu_sql);
			break;
	}
}

function wp_clean_up_count($type){
	global $wpdb;
	switch($type){
		case "revision":
			$wcu_sql = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'revision'";
			$count = $wpdb->get_var($wcu_sql);
			break;
		case "draft":
			$wcu_sql = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'draft'";
			$count = $wpdb->get_var($wcu_sql);
			break;
		case "autodraft":
			$wcu_sql = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'auto-draft'";
			$count = $wpdb->get_var($wcu_sql);
			break;
		case "moderated":
			$wcu_sql = "SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '0'";
			$count = $wpdb->get_var($wcu_sql);
			break;
		case "spam":
			$wcu_sql = "SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = 'spam'";
			$count = $wpdb->get_var($wcu_sql);
			break;
	}
	return $count;
}


function wp_clean_up_settings_link($action_links,$plugin_file){
	if($plugin_file==plugin_basename(__FILE__)){
		$wcu_settings_link = '<a href="options-general.php?page=' . dirname(plugin_basename(__FILE__)) . '/wp_clean_up_admin.php">' . __("Settings") . '</a>';
		array_unshift($action_links,$wcu_settings_link);
	}
	return $action_links;
}
add_filter('plugin_action_links','wp_clean_up_settings_link',10,4);

if(is_admin()){require_once('wp_clean_up_admin.php');}
?>