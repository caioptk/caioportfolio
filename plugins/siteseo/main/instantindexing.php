<?php
/*
* SITESEO
* https://siteseo.io
* (c) SiteSEO Team
*/

namespace SiteSEO;

if(!defined('ABSPATH')){
	die('HACKING ATTEMPT!');
}

class InstantIndexing{
	
	static function bing_txt_file(){
		global $wp, $siteseo;
		
		$request = home_url($wp->request);
		if(empty($request)){
			return;
		}

		$api_key = $siteseo->instant_settings['instant_indexing_bing_api_key'];
		$api_url = trailingslashit(home_url()) . $api_key . '.txt';
		
		if($request == $api_url){
			header('X-Robots-Tag: noindex');
			header('Content-Type: text/plain');
			status_header(200);

			esc_html_e($api_key);
			die();
		}
	}
	
	static function submit_urls_to_google($urls){
		$access_token = self::get_google_auth_token();

		if(empty($access_token)){
			return;
		}

		$boundary = mt_rand();
		$batch_body = '';
		$options = get_option('siteseo_instant_indexing_option_name');
		$type = !empty($options['instant_indexing_google_action']) ? $options['instant_indexing_google_action'] : 'URL_UPDATED';
		
		switch($type){
			case 'remove_urls':
				$type = 'URL_DELETED';
				break;
			
			case 'update_urls':
				$type = 'URL_UPDATED';
				break;
		}
		
		// Creating a batch request
		foreach($urls as $url){
			$post_data = json_encode(['url' => $url, 'type' => $type]);

			$batch_body .= '--'.$boundary.PHP_EOL;
			$batch_body .= 'Content-Type: application/http'.PHP_EOL;
			$batch_body .= 'Content-Transfer-Encoding: binary'.PHP_EOL;
			$batch_body .= 'Content-ID: <'.esc_url($url).'>'.PHP_EOL.PHP_EOL;
			$batch_body .= 'POST /v3/urlNotifications:publish HTTP/1.1'.PHP_EOL;
			$batch_body .= 'Content-Type: application/json' . PHP_EOL;
			$batch_body .= 'accept: application/json'.PHP_EOL;
			$batch_body .= 'content-length: '.strlen($post_data).PHP_EOL.PHP_EOL;
			$batch_body .= $post_data.PHP_EOL;
		}

		$batch_body .= '--'.$boundary.'--';

		$response = wp_remote_post('https://indexing.googleapis.com/batch', [
			'body' => $batch_body,
			'headers' => [
				'Content-Type' => 'multipart/mixed; boundary='.$boundary,
				'Authorization' => 'Bearer ' . $access_token
			],
			'timeout' => 30
		]);
		
		if(is_wp_error($response)){
			$response = ['error' => $response->get_error_message()];
			return;
		}
		
		$res_code = wp_remote_retrieve_response_code($response);

		if($res_code > 299){
			return $response;
		}
		
		$batch_response = self::parse_batch_response($response);

		$response = [
			'status_code' => wp_remote_retrieve_response_code($response),
			'urls' => $batch_response,
			'error' => is_wp_error($response) ? $response->get_error_message() : null
		];

		return $response;
	}

	static function parse_batch_response(&$response){
		$response_headers = wp_remote_retrieve_headers($response);
		$response_headers = $response_headers->getAll();

		$content_type = $response_headers['content-type'];

		$urls = [];

		$content_type = explode(';', $content_type);
		$boundary = false;
		foreach($content_type as $part){
			$part = explode('=', $part, 2);
			if (isset($part[0]) && 'boundary' == trim($part[0])) {
				$boundary = $part[1];
			}
		}

		$res_body = wp_remote_retrieve_body($response);
		$res_body = str_replace('--'.$boundary.'--', '--'.$boundary, $res_body);
		$batch_responses = explode('--'.$boundary, $res_body);
		$batch_responses = array_filter($batch_responses);

		foreach($batch_responses as $batch_response){
			$batch_response = trim($batch_response);
			if(empty($batch_response)){
				continue;
			}

			$batch_response = explode("\r\n\r\n", $batch_response);

			if(empty($batch_response[2])){
				continue;
			}

			$batch_body = json_decode($batch_response[2], true);

			if(empty($batch_body)){
				continue;
			}

			if(!empty($batch_body['urlNotificationMetadata']) && !empty($batch_body['urlNotificationMetadata']['url'])){
				$urls[] = sanitize_url($batch_body['urlNotificationMetadata']['url']);
			}
		}

		return $urls;
	}
	
	static function get_google_auth_token(){
		global $siteseo;
		
		$endpoint = 'https://oauth2.googleapis.com/token';
		$scope = 'https://www.googleapis.com/auth/indexing';
		
		if(!function_exists('openssl_sign')){
			return false;
		}

		$google_api_data = isset($siteseo->instant_settings['instant_indexing_google_api_key']) ? $siteseo->instant_settings['instant_indexing_google_api_key'] : '';
		
		if(empty($google_api_data)){
			return false;
		}

		$google_api_data = json_decode($google_api_data, true);
		if(empty($google_api_data)){
			return;
		}

		// Header
		$headers = json_encode(['alg' => 'RS256', 'typ' => 'JWT']);
		$headers = base64_encode($headers);

		// Claim Set
		$now = time();
		$claims = json_encode([
			'iss' => $google_api_data['client_email'],
			'scope' => 'https://www.googleapis.com/auth/indexing',
			'aud' => 'https://oauth2.googleapis.com/token',
			'exp' => $now + 3600,
			'iat' => $now
		]);

		$claims = base64_encode($claims);

		// Make sure base64 encoding is URL-safe
		$headers = str_replace(['+', '/', '='], ['-', '_', ''], $headers);
		$claim = str_replace(['+', '/', '='], ['-', '_', ''], $claims);

		// Sign the JWT with the private key
		$signature_input = "$headers.$claim";
		openssl_sign($signature_input, $signature, $google_api_data['private_key'], OPENSSL_ALGO_SHA256);

		$signature = base64_encode($signature);
		$signature = str_replace(['+', '/', '='], ['-', '_', ''], $signature);

		// JWT Token
		$jwt_assertion = "$signature_input.$signature";

		// OAuth2 Request
		$post_data = http_build_query([
			'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
			'assertion' => $jwt_assertion
		]);

		$response = wp_remote_post($endpoint, [
			'body' => $post_data,
			'headers' => [
				'Content-Type' => 'application/x-www-form-urlencoded',
			]
		]);

		if(is_wp_error($response)){
			return false;
		}

		$body = json_decode(wp_remote_retrieve_body($response), true);
		return $body['access_token'] ?? false;

	}

    static function submit_urls_to_bing($urls, $api_key){
        $host = parse_url(home_url(), PHP_URL_HOST);
		$key_location = trailingslashit(home_url()) . $api_key . '.txt';

        $endpoint = 'https://api.indexnow.org/indexnow/';
        $body = wp_json_encode([
            'host' => $host, 
            'key' => $api_key,
			'keyLocation' => $key_location,
            'urlList' => $urls
        ]);

        $response = wp_remote_post($endpoint, [
            'body' => $body,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ],
            'timeout' => 30
        ]);

        return [
            'status_code' => wp_remote_retrieve_response_code($response),
            'body' => wp_remote_retrieve_body($response)
        ];
    }
	
}