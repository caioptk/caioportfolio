<?php

if(!defined('ABSPATH')) {
	die('HACKING ATTEMPT!');
}

include_once BACKUPLY_DIR . '/main/settings.php';

// Handles submission of license
function backuply_license(){
	global $backuply, $lic_resp;

	check_admin_referer('backuply_license_form', 'backuply_license_nonce');
	
	$license = sanitize_key(backuply_optpost('backuply_license'));
	
	if(empty($license)) {
		add_settings_error('backuply-notice', esc_attr( 'settings_updated' ), esc_html__('The license key was not submitted', 'backuply'), 'error');
		
		return;
	}
	
	if(!function_exists('backuply_load_license')){
	
		$lic_resp = wp_remote_get(BACKUPLY_API.'/license.php?license='.$license.'&url='.rawurlencode(esc_url_raw(site_url())), array('timeout' => 30, 'sslverify' => false));

	}else{
		
		backuply_load_license($license);
		
	}

	if(is_array($lic_resp)){
		$json = json_decode($lic_resp['body'], true);
	}else{
		add_settings_error('backuply-notice', esc_attr( 'settings_updated' ), esc_html__('The response was malformed', 'backuply').'<br>'.var_export($lic_resp, true), 'error');
		return;
	}
	
	// Save the License
	if(empty($json['license'])){
		add_settings_error('backuply-notice', esc_attr( 'settings_updated' ), esc_html__('The license key is invalid', 'backuply'), 'error');
		
		return;
	}
	
	if(!function_exists('backuply_load_license')){
		
		if(get_option('backuply_license')) {
			update_option('backuply_license', $json);
		} else{
			add_option('backuply_license', $json);
		}
		
		$backuply['license'] = $json;
		
	}
}


function backuply_license_page() {
	global $backuply;
	
	if(!empty($_POST['save_backuply_license'])) {
		backuply_license();
	}
	
	// Update Cloud key and URL
	if(!empty($_POST['save_backuply_cloud_key'])){
		backuply_cloud_update();
	}
	
	backuply_page_header('License');
	settings_errors('backuply-notice');

	?>
		<table class="wp-list-table fixed striped users backuply-license-table" cellspacing="1" border="0" width="95%" cellpadding="10" align="center">
			<tbody>
				<tr>
					<th align="left" width="25%">Backuply Version</th>
					<td><?php
						echo BACKUPLY_VERSION.(defined('BACKUPLY_PRO') ? ' (Pro Version)' : '');
					?>
					</td>
				</tr>
				<tr>
					<th align="left" valign="top">Backuply License</th>
					<td align="left">
						<form method="post">
							<span style="color:red"><?php echo (defined('BACKUPLY_PRO') && empty($backuply['license']) ? '<span style="color:red">Unlicensed</span> &nbsp; &nbsp;' : '')?></span>

							<input type="text" name="backuply_license" value="<?php echo (empty($backuply['license']) || empty($backuply['license']['license']) ? '' : esc_html($backuply['license']['license']))?>" size="30" placeholder="e.g. BAKLY-11111-22222-33333-44444" style="width:300px;"> &nbsp;
							<?php wp_nonce_field( 'backuply_license_form','backuply_license_nonce' ); ?>
							<input name="save_backuply_license" class="button button-primary" value="Update License" type="submit">
						</form>
						<?php if(!empty($backuply['license']) && !empty($backuply['license']['expires'])){

							$expires = $backuply['license']['expires'];
							$expires = substr($expires, 0, 4).'/'.substr($expires, 4, 2).'/'.substr($expires, 6);
							
							echo '<div style="margin-top:10px;">License Status : '.(empty($backuply['license']['status_txt']) ? 'N.A.' : wp_kses_post($backuply['license']['status_txt'])).' &nbsp; &nbsp; &nbsp;';

							if(empty($backuply['license']['has_plid']) || $backuply['license']['expires'] <= date('Ymd')){
								echo 'License Expires : '.($backuply['license']['expires'] <= date('Ymd') ? '<span style="color:red">'.esc_html($expires).'</span>' : esc_html($expires));
							}
							echo '</div>';
						}

						if(!empty($backuply['license']['quota']) && !empty($backuply['license']['quota'])){
							echo '<div style="margin-top:3px;">Cloud Storage: '.size_format(esc_html($backuply['license']['quota'])).'</div>';
						}

						?>
					</td>
				</tr>

				<tr>
					<th align="left" valign="top">Backuply Cloud</th>
					<?php

					echo '<td align="left">

						<div style="display:flex; flex-direction:column;">
							<form method="post">
								<label>
									<input type="text" name="bcloud_key" value="'.(!empty($backuply['bcloud_key']) ? esc_attr($backuply['bcloud_key']) : '').'" size="30" placeholder="Your Backuply Cloud Key" style="width:300px;">
									'.wp_nonce_field('backuply_cloud_form', 'backuply_cloud_nonce').'
									<input name="save_backuply_cloud_key" class="button button-primary" value="Update Cloud Key" type="submit">
									<p class="description">'.__('Backuply Cloud Key works in combination with Backuply License which you get when you buy a plan', 'backuply').'<br>'.__('The key is generated automatically, when you add Backuply Cloud location to a new site, for more info read this', 'backuply').' <a href="https://backuply.com/docs/backuply-cloud/how-to-get-backuply-cloud-key/#lost-backuply-clou-key" target="_blank">docs</a></p>
								</label>
							</form>
							<label>
							<input type="text" value="'.site_url().'" size="30" placeholder="Backuply Cloud Linked Site URL" style="width:300px;" readonly>
							<p class="description">Site URL</p>
							</label>
								
						</div>
							
					</td>';
					?>
				</tr>
				<tr>
					<th align="left">URL</th>
					<td><?php echo esc_url(get_site_url()); ?></td>
				</tr>
				<tr>				
					<th align="left">Path</th>
					<td><?php echo ABSPATH; ?></td>
				</tr>
				<tr>				
					<th align="left">Server's IP Address</th>
					<td><?php echo !empty($_SERVER['SERVER_ADDR']) ? wp_kses_post(wp_unslash($_SERVER['SERVER_ADDR'])) : '-'; ?></td>
				</tr>
				<tr>
					<th align="left">.htaccess is writable</th>
					<td><?php echo (is_writable(ABSPATH.'/.htaccess') ? '<span style="color:red">Yes</span>' : '<span style="color:green">No</span>');?></td>
				</tr>		
			</tbody>
		</table>
	</td>
	<td>
		<?php backuply_promotion_tmpl(); ?>
	</td>
</tr>
</table>
</div>
</div>
</div>
</div>
	
<?php
}

function backuply_cloud_update(){
	global $backuply;

	if(!wp_verify_nonce($_POST['backuply_cloud_nonce'], 'backuply_cloud_form')){
		echo 'Security Check Failed';
		return false;
	}
	
	$backuply['bcloud_key'] = sanitize_text_field($_POST['bcloud_key']);
	update_option('bcloud_key', $backuply['bcloud_key']);
}


