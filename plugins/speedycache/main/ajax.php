<?php

namespace SpeedyCache;

if(!defined('ABSPATH')){
	die('HACKING ATTEMPT!');
}

use \SpeedyCache\Util;

class Ajax{
	
	static function hooks(){
		add_action('wp_ajax_speedycache_delete_page_cache', '\SpeedyCache\Ajax::delete_page_cache');
		add_action('wp_ajax_speedycache_save_cache_settings', '\SpeedyCache\Ajax::save_cache_settings');
		add_action('wp_ajax_speedycache_save_file_settings', '\SpeedyCache\Ajax::save_file_settings');
		add_action('wp_ajax_speedycache_save_preload_settings', '\SpeedyCache\Ajax::save_preload_settings');
		add_action('wp_ajax_speedycache_save_media_settings', '\SpeedyCache\Ajax::save_media_settings');
		add_action('wp_ajax_speedycache_save_cdn_settings', '\SpeedyCache\Ajax::save_cdn_settings');
		add_action('wp_ajax_speedycache_test_pagespeed', '\SpeedyCache\Ajax::test_pagespeed');
		add_action('wp_ajax_speedycache_save_excludes', '\SpeedyCache\Ajax::save_excludes');
		add_action('wp_ajax_speedycache_delete_exclude_rule', '\SpeedyCache\Ajax::delete_exclude_rule');
		
		if(defined('SPEEDYCACHE_PRO')){
			add_action('wp_ajax_speedycache_optm_db', '\SpeedyCache\Ajax::optm_db');
			add_action('wp_ajax_speedycache_flush_objects', '\SpeedyCache\Ajax::flush_objs');
			add_action('wp_ajax_speedycache_save_object_settings', '\SpeedyCache\Ajax::save_object_settings');
			add_action('wp_ajax_speedycache_save_bloat_settings', '\SpeedyCache\Ajax::save_bloat_settings');
			add_action('wp_ajax_speedycache_preloading_add_settings', '\SpeedyCache\Ajax::add_preload_settings');
			add_action('wp_ajax_speedycache_preloading_delete_resource', '\SpeedyCache\Ajax::delete_preload_resource');

			// Critical CSS
			add_action('wp_ajax_speedycache_critical_css', '\SpeedyCache\Ajax::generate_critical_css');
		}
	}

	static function delete_page_cache(){
		check_ajax_referer('speedycache_ajax_nonce');

		$page_id = Util::sanitize_get('page_id');
		
		if(empty($page_id)){
			wp_send_json_error(__('Can not delete cache of this page as the page ID is empty', 'speedycache'));
		}

	}

	static function save_cache_settings(){
		check_ajax_referer('speedycache_ajax_nonce');
		
		if(!current_user_can('manage_options')){
			wp_send_json_error(__('You do not have required permission.', 'speedycache'));
		}
		
		global $speedycache;

		$options = get_option('speedycache_options');

		$options['status'] = isset($_REQUEST['status']);
		$options['preload'] = isset($_REQUEST['preload']);
		$options['preload_interval'] = (int) Util::sanitize_request('preload_interval', 0);
		$options['logged_in_user'] = isset($_REQUEST['logged_in_user']);
		$options['mobile'] = isset($_REQUEST['mobile']);
		$options['mobile_theme'] = isset($_REQUEST['mobile_theme']);
		$options['lbc'] = isset($_REQUEST['lbc']);
		$options['gzip'] = isset($_REQUEST['gzip']);
		$options['purge_varnish'] = isset($_REQUEST['purge_varnish']);
		$options['varniship'] = !empty($_REQUEST['varniship']) ? Util::sanitize_request('varniship') : '';
		$options['purge_interval'] = (int) Util::sanitize_request('purge_interval', 0);
		$options['purge_interval_unit'] = Util::sanitize_request('purge_interval_unit', 'days');
		$options['purge_enable_exact_time'] = isset($_REQUEST['purge_enable_exact_time']);
		$options['purge_exact_time'] = Util::sanitize_request('purge_exact_time', 0);
		$options['auto_purge_fonts'] = isset($_REQUEST['auto_purge_fonts']);
		$options['auto_purge_gravatar'] = isset($_REQUEST['auto_purge_gravatar']);

		wp_clear_scheduled_hook('speedycache_purge_cache');
		wp_clear_scheduled_hook('speedycache_preload');

		$speedycache->options = $options;
		update_option('speedycache_options', $options);

		\SpeedyCache\Htaccess::init();
		\SpeedyCache\Install::set_advanced_cache();
		Util::set_config_file(); // Updates the config file

		wp_send_json_success();
	}
	
	static function save_file_settings(){
		check_ajax_referer('speedycache_ajax_nonce');
		
		if(!current_user_can('manage_options')){
			wp_send_json_error(__('You do not have required permission.', 'speedycache'));
		}
		
		global $speedycache;
		
		$options = get_option('speedycache_options', []);
		
		// CSS options
		$options['minify_html'] = isset($_REQUEST['minify_html']);
		$options['minify_css'] = isset($_REQUEST['minify_css']);
		$options['combine_css'] = isset($_REQUEST['combine_css']);

		$options['unused_css'] = isset($_REQUEST['unused_css']);
		$options['critical_css'] = isset($_REQUEST['critical_css']);
		$options['unusedcss_load'] = Util::sanitize_request('unusedcss_load');
		$options['unused_css_exclude_stylesheets'] = !empty($_REQUEST['unused_css_exclude_stylesheets']) ? explode("\n", sanitize_textarea_field(wp_unslash($_REQUEST['unused_css_exclude_stylesheets']))) : [];
		$options['unusedcss_include_selector'] = !empty($_REQUEST['unusedcss_include_selector']) ? explode("\n", sanitize_textarea_field(wp_unslash($_REQUEST['unusedcss_include_selector']))) : [];

		// JS options
		$options['minify_js'] = isset($_REQUEST['minify_js']);
		$options['combine_js'] = isset($_REQUEST['combine_js']);
		$options['delay_js'] = isset($_REQUEST['delay_js']);
		$options['delay_js_mode'] = isset($_REQUEST['delay_js_mode']) ? Util::sanitize_request('delay_js_mode') : '';
		$options['delay_js_excludes'] = !empty($_REQUEST['delay_js_excludes']) ? explode("\n", sanitize_textarea_field(wp_unslash($_REQUEST['delay_js_excludes']))) : [];
		$options['delay_js_scripts'] = !empty($_REQUEST['delay_js_scripts']) ? array_unique(array_map('trim', explode("\n", sanitize_textarea_field(wp_unslash($_REQUEST['delay_js_scripts']))))) : [];
		$options['render_blocking'] = isset($_REQUEST['render_blocking']);
		$options['render_blocking_excludes'] = isset($_REQUEST['render_blocking_excludes']) ? explode("\n", sanitize_textarea_field(wp_unslash($_REQUEST['render_blocking_excludes']))) : [];
		$options['disable_emojis'] = isset($_REQUEST['disable_emojis']);
		$options['lazy_load_html'] = isset($_REQUEST['lazy_load_html']);

		if(isset($_REQUEST['lazy_load_html_elements'])){
			$options['lazy_load_html_elements'] = !empty($_REQUEST['lazy_load_html_elements']) ? explode("\n", sanitize_textarea_field(wp_unslash($_REQUEST['lazy_load_html_elements']))) : [];
		}

		$speedycache->options = $options;
		update_option('speedycache_options', $options);
		
		wp_send_json_success();
	}
	
	static function save_preload_settings(){
		check_ajax_referer('speedycache_ajax_nonce');
		
		if(!current_user_can('manage_options')){
			wp_send_json_error(__('You do not have required permission.', 'speedycache'));
		}
		
		global $speedycache;
		
		$options = get_option('speedycache_options');
		
		$options['critical_images'] = isset($_REQUEST['critical_images']);
		$options['critical_image_count'] = isset($_REQUEST['critical_images']) ? Util::sanitize_request('critical_image_count') : '';
		$options['instant_page'] = isset($_REQUEST['instant_page']);
		$options['dns_prefetch'] = isset($_REQUEST['dns_prefetch']);
		if(!empty($_REQUEST['dns_urls'])){
			$options['dns_urls'] = explode("\n", sanitize_textarea_field(wp_unslash($_REQUEST['dns_urls'])));
		}

		$options['preload_resources'] = isset($_REQUEST['preload_resources']);
		$options['pre_connect'] = isset($_REQUEST['pre_connect']);
		
		// TODO: here more options will be added after all modals have been added.
		$speedycache->options = $options;
		update_option('speedycache_options', $options);
		
		wp_send_json_success();
	}
	
	static function save_media_settings(){
		check_ajax_referer('speedycache_ajax_nonce');
		
		if(!current_user_can('manage_options')){
			wp_send_json_error(__('You do not have required permission.', 'speedycache'));
		}
		
		global $speedycache;
		
		$options = get_option('speedycache_options');
		$options['gravatar_cache'] = isset($_REQUEST['gravatar_cache']);
		$options['lazy_load'] = isset($_REQUEST['lazy_load']);
		$options['lazy_load_placeholder'] = Util::sanitize_request('lazy_load_placeholder');
		
		if(isset($_REQUEST['lazy_load_placeholder_custom_url'])){
			$options['lazy_load_placeholder_custom_url'] = !empty($_REQUEST['lazy_load_placeholder_custom_url']) ? sanitize_url(wp_unslash($_REQUEST['lazy_load_placeholder_custom_url'])) : '';
		}
		
		if(isset($_REQUEST['exclude_above_fold'])){
			$options['exclude_above_fold'] = !empty($_REQUEST['exclude_above_fold']) ? Util::sanitize_request('exclude_above_fold') : '';
		}
		
		if(isset($_REQUEST['lazy_load_keywords'])){
			$options['lazy_load_keywords'] = !empty($_REQUEST['lazy_load_keywords']) ? explode("\n", sanitize_textarea_field(wp_unslash($_REQUEST['lazy_load_keywords']))) : [];
		}
		
		$options['image_dimensions'] = isset($_REQUEST['image_dimensions']);
		$options['local_gfonts'] = isset($_REQUEST['local_gfonts']);
		$options['google_fonts'] = isset($_REQUEST['google_fonts']);
		$options['font_rendering'] = isset($_REQUEST['font_rendering']);

		// TODO: here more options will be added after all modals have been added.
		$speedycache->options = $options;
		update_option('speedycache_options', $options);
		
		wp_send_json_success();
		
	}
	
	static function save_object_settings(){
		check_ajax_referer('speedycache_ajax_nonce');
		
		if(!current_user_can('manage_options')){
			wp_send_json_error(__('You do not have required permission.', 'speedycache'));
		}
		
		global $speedycache;
		
		if(!class_exists('Redis')){
			wp_send_json_error(__('phpRedis Library not found', 'speedycache'));
			return;
		}

		$options = get_option('speedycache_object_cache', []);
		$options['enable'] = isset($_REQUEST['enable_object']);
		$options['host'] = Util::sanitize_request('host');
		$options['port'] = Util::sanitize_request('port');
		$options['username'] = Util::sanitize_request('username');
		$options['password'] = Util::sanitize_request('password');
		$options['hashed_prefix'] = substr(md5(site_url()), 0, 12);
		$options['ttl'] = Util::sanitize_request('ttl', 0);
		$options['db-id'] = Util::sanitize_request('db-id', 0);
		$options['persistent'] = isset($_REQUEST['persistent']);
		$options['admin'] = isset($_REQUEST['admin']);
		$options['async_flush'] = isset($_REQUEST['async_flush']);
		$options['serialization'] = Util::sanitize_request('serialization');
		$options['compress'] = Util::sanitize_request('compress');
		$options['non_cache_group'] = !empty('non_cache_group') ? explode("\n", sanitize_textarea_field(wp_unslash('non_cache_group'))) : [];
	
		$speedycache->object = $options;
		
		if(!file_put_contents(\SpeedyCache\ObjectCache::$conf_file, json_encode($speedycache->object))){
			wp_send_json_error(__('Unable to modify Object Cache Conf file, the issue might be related to permission on your server.', 'speedycache'));
			return;
		}
		
		if(!empty($speedycache->object['enable'])){
			\SpeedyCache\ObjectCache::update_file();
		} else {
			unlink(WP_CONTENT_DIR . '/object-cache.php');
		}
		
		try{
			\SpeedyCache\ObjectCache::boot();
		} catch(\Exception $e) {
			wp_send_json_error($e->getMessage());
			return;
		}

		\SpeedyCache\ObjectCache::flush_db();
		\SpeedyCache\ObjectCache::$instance = null;
		
		update_option('speedycache_object_cache', $options); // We need to update at last only after object cache can be enabled.

		wp_send_json_success();
	}
	
	static function save_cdn_settings(){
		check_ajax_referer('speedycache_ajax_nonce');
		
		if(!current_user_can('manage_options')){
			wp_send_json_error(__('You do not have required permission.', 'speedycache'));
		}
		
		global $speedycache;
		
		$options = get_option('speedycache_cdn', []);
		if(!is_array($options)){
			$options = [];
		}

		$options['enabled'] = isset($_REQUEST['enable_cdn']);
		$options['cdn_type'] = Util::sanitize_request('cdn_type');
		$options['cdn_key'] = sanitize_text_field(wp_unslash($_REQUEST['cdn_key']));
		$options['cdn_url'] = sanitize_url(wp_unslash($_REQUEST['cdn_url']));
		$options['excludekeywords'] = !empty($_REQUEST['excludekeywords']) ? explode("\n", sanitize_textarea_field(wp_unslash($_REQUEST['excludekeywords']))) : [];
		$options['file_types'] = !empty($_REQUEST['file_types']) ? explode("\n", sanitize_textarea_field(wp_unslash($_REQUEST['file_types']))) : [];
		$options['keywords'] = !empty($_REQUEST['keywords']) ? explode("\n", sanitize_textarea_field(wp_unslash($_REQUEST['keywords']))) : [];
		
		if(!empty($options['file_types'])){
			$options['file_types'] = map_deep($options['file_types'], 'trim');
		}
		
		if(!empty($options['keywords'])){
			$options['keywords'] = map_deep($options['keywords'], 'trim');
		}
		
		if(!empty($options['excludekeywords'])){
			$options['excludekeywords'] = map_deep($options['excludekeywords'], 'trim');
		}

		// Fetching the Zone/Pull ID's
		if($options['cdn_type'] === 'bunny' && !empty($options['cdn_key'])){
			$pull_id = \SpeedyCache\CDN::bunny_get_pull_id($options);
			
			if(!empty($pull_id) && !is_array($pull_id)){
				$options['bunny_pull_id'] = $pull_id;
			}
		}else if($options['cdn_type'] === 'cloudflare' && !empty($options['cdn_key'])){
			$zone_id = \SpeedyCache\CDN::cloudflare_zone_id($options);
			
			if(!empty($zone_id)){
				$options['cloudflare_zone_id'] = $zone_id;
			}
		}

		update_option('speedycache_cdn', $options);
		$speedycache->cdn = $options;

		wp_send_json_success();
	}
	
	static function save_bloat_settings(){
		check_ajax_referer('speedycache_ajax_nonce');
		
		if(!current_user_can('manage_options')){
			wp_send_json_error(__('You do not have required permission.', 'speedycache'));
		}
		
		global $speedycache;
		
		$options = get_option('speedycache_bloat', []);
		$options['disable_xmlrpc'] = isset($_REQUEST['disable_xmlrpc']);
		$options['remove_gfonts'] = isset($_REQUEST['remove_gfonts']);
		$options['disable_jmigrate'] = isset($_REQUEST['disable_jmigrate']);
		$options['disable_dashicons'] = isset($_REQUEST['disable_dashicons']);
		$options['disable_gutenberg'] = isset($_REQUEST['disable_gutenberg']);
		$options['disable_block_css'] = isset($_REQUEST['disable_block_css']);
		$options['disable_oembeds'] = isset($_REQUEST['disable_oembeds']);
		$options['disable_cart_fragment'] = isset($_REQUEST['disable_cart_fragment']);
		$options['disable_woo_assets'] = isset($_REQUEST['disable_woo_assets']);
		$options['disable_rss'] = isset($_REQUEST['disable_rss']);
		$options['update_heartbeat'] = isset($_REQUEST['update_heartbeat']);
		$options['heartbeat_frequency'] = Util::sanitize_request('heartbeat_frequency');
		$options['disable_heartbeat'] = Util::sanitize_request('disable_heartbeat');
		$options['limit_post_revision'] = isset($_REQUEST['limit_post_revision']);
		$options['post_revision_count'] = Util::sanitize_request('post_revision_count');

		$speedycache->bloat = $options;
		update_option('speedycache_bloat', $options);

		wp_send_json_success();
		
	}
	
	// Adds settings of Preload and preconnect options.
	static function add_preload_settings(){
		check_ajax_referer('speedycache_ajax_nonce', 'security');
		
		if(!current_user_can('manage_options')){
			wp_send_json_error('Must be admin');
		}
		
		global $speedycache;
		
		if(empty($_REQUEST['type'])){
			wp_send_json_error('Unable to find the settings type');
		}
		
		$type = sanitize_text_field(wp_unslash($_REQUEST['type']));

		if(!in_array($type, ['pre_connect_list', 'preload_resource_list'])){
			wp_send_json_error(__('Could not figure out type of the setting being saved!', 'speedycache'));
		}

		if(empty($_REQUEST['settings'])){
			wp_send_json_error(__('No settings provided to save', 'speedycache'));
		}
		
		if(empty($speedycache->options[$type])){
			$speedycache->options[$type] = [];
		}
		
		$settings = [];
		if(empty($_REQUEST['settings']['resource'])){
			wp_send_json_error(__('No resource provided!', 'speedycache'));
		}

		$settings['resource'] = sanitize_url(wp_unslash($_REQUEST['settings']['resource']));
		$settings['crossorigin'] = isset($_REQUEST['settings']['crossorigin']);
		$settings['type'] = sanitize_text_field(wp_unslash($_REQUEST['settings']['type']));

		$index = count($speedycache->options[$type]);
		
		if(empty($speedycache->options[$type])){
			$speedycache->options[$type][$index] = $settings;
			update_option('speedycache_options', $speedycache->options);
			wp_send_json_success($index);
		}
		
		foreach($speedycache->options[$type] as $pre_connect){
			if($pre_connect['resource'] == $settings['resource']){
				wp_send_json_error(__('This resource has already been added before', 'speedycache'));
			}
		}
		
		$speedycache->options[$type][$index] = $settings;
		update_option('speedycache_options', $speedycache->options);

		wp_send_json_success($index);

	}

	static function delete_preload_resource(){
		check_ajax_referer('speedycache_ajax_nonce', 'security');

		if(!current_user_can('manage_options')){
			wp_send_json_error('Must be admin');
		}
		
		global $speedycache;

		if(!isset($_REQUEST['type']) || !isset($_REQUEST['key']) || $_REQUEST['key'] == NULL){
			wp_send_json_error('Key or Type is empty so can not delete this resource');
		}

		$type = isset($_REQUEST['type']) ? sanitize_text_field(wp_unslash($_REQUEST['type'])) : '';
		$key = isset($_REQUEST['key']) ? sanitize_text_field(wp_unslash($_REQUEST['key'])) : '';

		if(!in_array($type, ['pre_connect_list', 'preload_resource_list'])){
			wp_send_json_error('Could not figure out type of the resource being deleted!');
		}

		if(empty($speedycache->options[$type])){
			wp_send_json_error('Nothing there to delete');
		}
		
		if(array_key_exists($key, $speedycache->options[$type])){
			unset($speedycache->options[$type][$key]);
			update_option('speedycache_options', $speedycache->options);
		}

		wp_send_json_success();
	}
	
	static function test_pagespeed(){

		check_ajax_referer('speedycache_ajax_nonce', 'security');
		
		if(!current_user_can('manage_options')){
			wp_send_json_error(__('You do not have required permission.', 'speedycache'));
		}
		
		$url = home_url();
		
		if(empty($url)){
			wp_send_json_error('Your site does not have a home URL');
		}

		$api_url = SPEEDYCACHE_API . 'pagespeed.php?url='. $url; 

		$res = wp_remote_post($api_url, array(
			'sslverify' => false,
			'timeout' => 60
		));
		
		if(empty($res) || is_wp_error($res)){
			if($res->get_error_message()){
				wp_send_json_error($res->get_error_message());
			}

			wp_send_json_error('The response turned out to be empty');
		}

		if(empty($res['body'])){
			wp_send_json_error('The response body is empty');
		}
		
		$body = json_decode($res['body'], 1);
		
		if(empty($body['success'])){
			wp_send_json_error($res['body']);
		}
		
		if(empty($body['results'])){
			wp_send_json_error('Result is empty');
		}

		//Saving the pagespeed test
		update_option('speedycache_pagespeed_test', $body['results'], false);

		$body['results']['color'] = \SpeedyCache\Util::pagespeed_color($body['results']['score']);

		// We will now need to filter the output.
		wp_send_json_success($body['results']);
	}
	
	static function save_excludes(){

		check_ajax_referer('speedycache_ajax_nonce');

		if(!current_user_can('manage_options')){
			wp_send_json_error(__('You do not have required permission.', 'speedycache'));
		}
		
		if(empty($_REQUEST['type'])){
			wp_send_json_error(__('You need to select a Exclude type', 'speedycache'));
		}
		
		if(empty($_REQUEST['prefix'])){
			wp_send_json_error(__('You have not selected, the exclude option', 'speedycache'));
		}
		
		$type = Util::sanitize_request('type');
		$prefix = Util::sanitize_request('prefix');
		
		$single_prefixes = ['homepage', 'category', 'tag', 'post', 'page', 'archive', 'attachment', 'googleanalytics', 'woocommerce_items_in_cart', 'post_id'];
		
		if(empty($_REQUEST['content']) && !in_array($prefix, $single_prefixes)){
			wp_send_json_error(__('You need to fill the content field', 'speedycache'));
		}
		
		$excludes = get_option('speedycache_exclude', []);
		
		$rule['type'] = $type;
		$rule['prefix'] = $prefix;
		$rule['content'] = !empty($_REQUEST['content']) ? Util::sanitize_request('content') : '';
		array_push($excludes, $rule);
		
		update_option('speedycache_exclude', $excludes);
		Util::set_config_file(); // Updates the config file

		// TODO: updating the htaccess to include the excludes.

		wp_send_json_success();
	}
	
	static function delete_exclude_rule(){

		check_ajax_referer('speedycache_ajax_nonce');

		if(!current_user_can('manage_options')){
			wp_send_json_error(__('You do not have required permission.', 'speedycache'));
		}
		
		if(!isset($_REQUEST['rule_id'])){
			wp_send_json_error(__('No rule ID provided to delete', 'speedycache'));
		}
		
		$excludes = get_option('speedycache_exclude', []);
		
		if(empty($excludes)){
			wp_send_json_error(__('Exclude rule list is already empty', 'speedycache'));
		}
		
		$rule_id = sanitize_text_field(wp_unslash($_REQUEST['rule_id']));
		
		if(!isset($excludes[$rule_id])){
			wp_send_json_error(__('There is not rule with the given rule id', 'speedycache'));
		}

		unset($excludes[$rule_id]);

		// TODO: updating the htaccess to include the excludes.
		update_option('speedycache_exclude', $excludes);
		
		wp_send_json_success();
	}
	
	static function optm_db(){
		check_ajax_referer('speedycache_ajax_nonce', 'security');
		
		if(!current_user_can('manage_options')){
			wp_send_json_error(__('You do not have required permission.', 'speedycache'));
		}
		
		if(!isset($_REQUEST['db_action'])){
			wp_send_json_error(__('No Database optimization action present', 'speedycache'));
		}
		
		$db_action = \SpeedyCache\Util::sanitize_request('db_action');
		
		if(!defined('SPEEDYCACHE_PRO')){
			wp_send_json_error(__('This is a Pro feature you can not use this with a Free version', 'speedycache'));
		}

		\SpeedyCache\DB::clean($db_action);
	}
	
	static function flush_objs(){
		check_ajax_referer('speedycache_ajax_nonce', 'security');
		
		if(!current_user_can('manage_options')){
			wp_send_json_error(__('You do not have required permission.', 'speedycache'));
		}
		
		global $speedycache;

		if(empty($speedycache->object['enable'])){
			wp_send_json_error(__('Object Cache need to be enabled for it to be flushed', 'speedycache'));
		}

		try{
			\SpeedyCache\ObjectCache::boot();
		} catch(\Exception $e){
			wp_send_json_error($e->getMessage());
		}
		
		$res = \SpeedyCache\ObjectCache::flush_db();

		if(!empty($res)){
			wp_send_json_success();
		}
	}

	static function generate_critical_css(){
		check_ajax_referer('speedycache_ajax_nonce', 'security');
	
		if(!current_user_can('manage_options')){
			wp_die('Must be admin');
		}

		global $speedycache;
		
		if(!class_exists('\SpeedyCache\CriticalCss')){
			wp_send_json_error(array('message' => 'Your SpeedyCache Pro does not have the required file to run Critical CSS'));
		}
		
		if(empty($speedycache->license['license'])){
			wp_send_json_error(array('message' => 'You have not linked your License, please do it before creating Critical CSS'));
		}

		$urls = \SpeedyCache\CriticalCss::get_url_list();

		if(empty($urls)){
			wp_send_json_error(array('message' => 'No URL found to create critical CSS'));
		}
		
		\SpeedyCache\CriticalCss::schedule('speedycache_generate_ccss', $urls);
		
		wp_send_json_success(array('message' => 'The URLs have been queued to generate Critical CSS'));
	}
}
