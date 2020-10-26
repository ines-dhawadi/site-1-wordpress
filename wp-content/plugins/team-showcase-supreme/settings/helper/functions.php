<?php
if (!function_exists('wpm_6310_replace')) {
	function wpm_6310_replace($str)
	{
		$str = stripslashes($str);
		return str_replace("\’", "'", $str);
	}
}

if (!function_exists("wpm6310IconExist")) {
	function wpm6310IconExist($icons){
		if($icons) {
			$iconUrl = explode("||||", $icons);
			$iconIds = explode(",", $icons);
			for($i = 0; $i < count($iconUrl); $i++){
				if($iconIds[$i] != "" && $iconUrl[$i] != ""){
					return true;
				}
			}
		}
		return false;
	}
}

if (!function_exists("wpm_6310_external_link")) {
	function wpm_6310_external_link($data)
	{
		if (filter_var($data, FILTER_VALIDATE_EMAIL)) {
			$data = " href='mailto:{$data}'   class='open_in_new_tab_class'";
		} else if (filter_var($data, FILTER_VALIDATE_URL)) {
			$data = " href='{$data}' target=\"_blank\"  class='open_in_new_tab_class' ";
		} else if (substr($data, 0, 4) == "tel:") {
			$data = " href='{$data}' class='open_in_new_tab_class'";
		} else {
			$data = " tooltip-href='{$data}' wpm-6310-tooltip='yes'  class='open_in_new_tab_class wpm-6310-tooltip' ";
		}
		return $data;
	}
}

if (!function_exists('wpm_6310_split_code')) {
	function wpm_6310_split_code($ids, $data)
	{
		$css = "";
		$data1 = explode("}", $data);
		if ($data1) {
			foreach ($data1 as $step1) {
				if ($step1 &&  strlen($step1) > 2) {
					$data2 = explode("{", $step1);
					if ($data2) {
						$data3 = explode(",", $data2[0]);
						$r = "";
						foreach ($data3 as $value) {
							if ($r) {
								$r .= ", ";
							}
							$r .= ".wpm_main_template_{$ids} $value";
						}
						$css .= $r . "{" . $data2[1] . "}";
					}
				}
			}
		}
		return $css;
	}
}

if (!function_exists('wpm_6310_wordcount')) {
	function wpm_6310_wordcount($file, $count)
	{
		$t = $data = strip_tags($file);
		$str = "";
		for ($i = 0; $i < strlen($data); $i++) {
			if (substr($t, 0, 1) == " ") {
				$str .= " ";
				$t = substr($t, 1);
				$count--;
				if ($count == 0) {
					break;
				}
			} else {
				$str .= substr($t, 0, 1);
				$t = substr($t, 1);
			}
		}
		$str = str_replace("\'", "'", $str);
		$str = str_replace("\'", "'", $str);
		$str = str_replace("\'", "'", $str);
		return $str;
	}
}

if (!function_exists('wpm_6310_team_member_details')) {
	function wpm_6310_team_member_details()
	{
		global $wpdb;
		$ids = (int) sanitize_text_field($_GET['ids']);
		$data['styledata'] = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}wpm_6310_member WHERE id = %d ", $ids), ARRAY_A);

		$data['styledata']['profile_details'] = str_replace("\'", "'", $data['styledata']['profile_details']);
		$data['styledata']['profile_details'] = str_replace('\"', '"', $data['styledata']['profile_details']);


		if ($data['styledata']['iconids']) {
			$icons = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$wpdb->prefix}wpm_6310_icons WHERE id in ({$data['styledata']['iconids']})", ""), ARRAY_A);
			if ($icons) {
				$iconUrl = explode("||||", $data['styledata']['iconurl']);
				$iconIds = explode(",", $data['styledata']['iconids']);
				$html = "";
				$iconStyles = "";
				foreach ($icons as $li) {
					$index = array_search($li['id'], $iconIds);
					$html .= "<a " . wpm_6310_external_link($iconUrl[$index]) . "  class='wpm-popup-link' title='{$li['name']}'  id='wpm-social-link-{$ids}-{$li['id']}'><i class='" . $li['class_name'] . "'></i></a>";
					$iconStyles .= "<style>#wpm-social-link-{$ids}-{$li['id']}{border: 1px solid {$li['bgcolor']}; background-color: {$li['bgcolor']}; color:{$li['color']};} #wpm-social-link-{$ids}-{$li['id']}:hover{background-color: {$li['color']}; color:{$li['bgcolor']};} </style>";
				}
				$data['link'] = $html . $iconStyles;
			} else {
				$data['link'] = "";
			}
		} else {
			$data['link'] = "";
		}
		echo json_encode($data);
		wp_die();
	}
}

if (!function_exists('wpm_6310_team_member_info')) {
	function wpm_6310_team_member_info()
	{
		global $wpdb;
		$ids = (int) sanitize_text_field($_GET['ids']);
		$data['styledata'] = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}wpm_6310_member WHERE id = %d ", $ids), ARRAY_A);

		$data['styledata']['profile_details'] = str_replace("\'", "'", $data['styledata']['profile_details']);
		$data['styledata']['profile_details'] = str_replace('\"', '"', $data['styledata']['profile_details']);


		if ($data['styledata']['iconids']) {
			$icons = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$wpdb->prefix}wpm_6310_icons WHERE id in ({$data['styledata']['iconids']})", ""), ARRAY_A);
			if ($icons) {
				$iconUrl = explode("||||", $data['styledata']['iconurl']);
				$iconIds = explode(",", $data['styledata']['iconids']);
				$html = "";
				$iconStyles = "";
				foreach ($icons as $li) {
					$index = array_search($li['id'], $iconIds);
					$html .= "<a " . wpm_6310_external_link($iconUrl[$index]) . "  class='wpm-popup-link' title='{$li['name']}'  id='wpm-social-link-{$ids}-{$li['id']}'><i class='" . $li['class_name'] . "'></i></a>";
					$iconStyles .= "<style>#wpm-social-link-{$ids}-{$li['id']}{border: 1px solid {$li['bgcolor']}; background-color: {$li['bgcolor']}; color:{$li['color']};} #wpm-social-link-{$ids}-{$li['id']}:hover{background-color: {$li['color']}; color:{$li['bgcolor']};} </style>";
				}
				$data['link'] = $html . $iconStyles;
			} else {
				$data['link'] = "";
			}
		} else {
			$data['link'] = "";
		}
		echo json_encode($data);
		wp_die();
	}
}

if (!function_exists('wpm_link_css_js')) {
	function wpm_link_css_js()
	{
		wp_enqueue_style('font-awesome-5-0-13', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css');
		wp_enqueue_style('wpm-codemirror-style', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.0/codemirror.min.css');
		wp_enqueue_style('wpm-color-style', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-minicolors/2.3.4/jquery.minicolors.min.css');
		wp_enqueue_style('wpm-jquery-ui-css', "https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css");
		wp_enqueue_script('wpm-jquery-ui-js', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array('jquery'));
		wp_enqueue_script('wpm-color-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-minicolors/2.3.4/jquery.minicolors.min.js', array('jquery'));
		wp_enqueue_script('wpm-codemirror-js', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.0/codemirror.min.js', array('jquery'));
	}
}

if (!function_exists('wpm_team_showcase_supreme_install')) {
	function wpm_team_showcase_supreme_install()
	{
		global $wpdb;
		global $wpm_team_showcase_version;

		$style_table = $wpdb->prefix . 'wpm_6310_style';
		$icon_table = $wpdb->prefix . 'wpm_6310_icons';
		$member_table = $wpdb->prefix . 'wpm_6310_member';

		$charset_collate = $wpdb->get_charset_collate();

		$sql1 = "CREATE TABLE IF NOT EXISTS $style_table (
				id int UNSIGNED NOT NULL AUTO_INCREMENT,
				name varchar(100) DEFAULT NULL,
				style_name varchar(100) DEFAULT NULL,
				css text DEFAULT NULL,
				slider text DEFAULT NULL,
				memberid text DEFAULT NULL,
				memberorder text DEFAULT NULL,
				PRIMARY KEY  (id)
			) $charset_collate;";

		$sql2 = "CREATE TABLE IF NOT EXISTS $icon_table (
				id int UNSIGNED NOT NULL AUTO_INCREMENT,
				name varchar(100) DEFAULT NULL,
				class_name varchar(100) DEFAULT NULL,
				color varchar(100) DEFAULT NULL,
				bgcolor varchar(100) DEFAULT NULL,
				PRIMARY KEY  (id)
			) $charset_collate;";

		$sql3 = "CREATE TABLE IF NOT EXISTS $member_table (
				id int UNSIGNED NOT NULL AUTO_INCREMENT,
				name varchar(100) DEFAULT NULL,
				designation varchar(100) DEFAULT NULL,
				profile_details_type tinyint(4) NOT NULL DEFAULT '0',
				profile_url text DEFAULT NULL,
				open_new_tab tinyint(4) NOT NULL DEFAULT '0',
				profile_details text DEFAULT NULL,
				effect varchar(100) DEFAULT NULL,
				image text DEFAULT NULL,
				iconids text DEFAULT NULL,
				iconurl text DEFAULT NULL,
				PRIMARY KEY(id)
			) $charset_collate;";

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		$iconData = $wpdb->query("select id from $icon_table LIMIT 1");
		dbDelta($sql1);
		dbDelta($sql2);
		dbDelta($sql3);

		if (!($iconData !== FALSE)) {
			$wpdb->query("INSERT INTO {$icon_table} (name, class_name, color, bgcolor) VALUES
				('Linkedin', 'fab fa-linkedin-in', '#ffffff', 'rgba(0, 119, 181, 1)'),
				('Twitter', 'fab fa-twitter', '#ffffff', 'rgba(85, 172, 238, 1)'),
				('Facebook', 'fab fa-facebook-f', '#ffffff', 'rgba(59, 89, 153, 1)'),
				('Skype', 'fab fa-skype', '#ffffff', 'rgba(0, 175, 240, 1)'),
				('Dropbox', 'fab fa-dropbox', '#ffffff', 'rgba(0, 126, 229, 1)'),
				('Wordpress', 'fab fa-wordpress', '#ffffff', 'rgba(33, 117, 155, 1)'),
				('vimeo', 'fab fa-vimeo-v', '#ffffff', 'rgba(26, 183, 234, 1)'),
				('Slideshare', 'fab fa-slideshare', '#ffffff', 'rgba(0, 119, 181, 1)'),
				('Vk', 'fab fa-vk', '#ffffff', 'rgba(76, 117, 163, 1)'),
				('Tumblr', 'fab fa-tumblr', '#ffffff', 'rgba(52, 70, 93, 1)'),
				('Yahoo', 'fab fa-yahoo', '#ffffff', 'rgba(65, 0, 147, 1)'),
				('Google Plus', 'fab fa-google-plus-g', '#ffffff', 'rgba(221, 75, 57, 1)'),
				('Pinterest', 'fab fa-pinterest-p', '#ffffff', 'rgba(189, 8, 28, 1)'),
				('Youtube', 'fab fa-youtube', '#ffffff', 'rgba(205, 32, 31, 1)'),
				('Stumbleupon', 'fab fa-stumbleupon', '#ffffff', 'rgba(235, 73, 36, 1)'),
				('Reddit', 'fab fa-reddit-alien', '#ffffff', 'rgba(255, 87, 0, 1)'),
				('Quora', 'fab fa-quora', '#ffffff', 'rgba(185, 43, 39, 1)'),
				('Yelp', 'fab fa-yelp', '#ffffff', 'rgba(175, 6, 6, 1)'),
				('Weibo', 'fab fa-weibo', '#fafafa', 'rgba(223, 32, 41, 1)'),
				('Producthunt', 'fab fa-product-hunt', '#ffffff', 'rgba(218, 85, 47, 1)'),
				('Hackernews', 'fab fa-hacker-news', '#ffffff', 'rgba(255, 102, 0, 1)'),
				('Soundcloud', 'fab fa-soundcloud', '#ffffff', 'rgba(255, 51, 0, 1)'),
				('Blogger', 'fab fa-blogger-b', '#ffffff', 'rgba(245, 125, 0, 1)'),
				('Whatsapp', 'fab fa-whatsapp', '#ffffff', 'rgba(37, 211, 102, 1)'),
				('Wechat', 'fab fa-weixin', '#ffffff', 'rgba(9, 184, 62, 1)'),
				('Medium', 'fab fa-medium-m', '#ffffff', 'rgba(2, 184, 117, 1)'),
				('Vine', 'fab fa-vine', '#ffffff', 'rgba(0, 180, 137, 1)'),
				('Slack', 'fab fa-slack-hash', '#ffffff', 'rgba(58, 175, 133, 1)'),
				('Instagram', 'fab fa-instagram', '#e4405f', 'rgba(255, 255, 255, 1)'),
				('Dribbble', 'fab fa-dribbble', '#ffffff', 'rgba(234, 76, 137, 1)'),
				('Flickr', 'fab fa-flickr', '#ffffff', 'rgba(255, 0, 132, 1)'),
				('Foursquare', 'fab fa-foursquare', '#ffffff', 'rgba(249, 72, 119, 1)'),
				('Behance', 'fab fa-behance', '#ffffff', 'rgba(19, 20, 24, 1)'),
				('Snapchat', 'fab fa-snapchat-ghost', '#ffffff', 'rgba(255, 252, 0, 1)'),
				('Paypal', 'fab fa-paypal', '#ffffff', 'rgba(0, 48, 135, 1)'),
				('Bandcamp', 'fab fa-bandcamp', '#ffffff', 'rgba(0, 150, 136, 1)')");
		}

		$memberData = $wpdb->query("select id from $member_table LIMIT 1");
		if (!($memberData)) {
			$details = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.

			Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
			
			It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
			
			It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";

			$sql = "INSERT INTO {$member_table} (name, designation, profile_details_type, profile_url, open_new_tab, profile_details, effect, image, iconids, iconurl) VALUES
			('Adam Smith', 'CEO', '2', '', '0', '{$details}', 'top', 'https://www.wpmart.org/wp-content/uploads/2020/04/1.jpg', '1,37,24', 'https://www.linkedin.com||||admin@gmail.com||||+123456789'),
			('George Michel', 'Sales Agent', '2', '', '0', '{$details}', 'top', 'https://www.wpmart.org/wp-content/uploads/2020/04/2.jpg', '2,37,38', 'https://www.facebook.com||||admin@gmail.com||||+123456789'),
			('Jeson Smith', 'Web Developer', '2', '', '0', '{$details}', 'top', 'https://www.wpmart.org/wp-content/uploads/2020/04/3.jpg', '2,1,24', 'https://www.facebook.com||||https://www.linkedin.com||||+123456789'),
			('Jones Lee', 'Web Designer', '2', '', '0', '{$details}', 'top', 'https://www.wpmart.org/wp-content/uploads/2020/04/4.jpg', '27,1,25', 'https://www.facebook.com||||admin@gmail.com||||+123456789')";

			$wpdb->query($sql);
		}
	}
}


if (!function_exists('wpm_version_status')) {
	function wpm_version_status() {
		global $wpdb;
		$db_version = get_option( 'wpm_6310_version_info');
		if(!$db_version){
				$wpdb->query("INSERT INTO {$wpdb->prefix}options(option_name, option_value) VALUES ('wpm_6310_version_info', '".WPM_PLUGIN_CURRENT_VERSION."')");
		}
		else{
			$key = get_option( 'wpm_6310_license_key');
			if($db_version != WPM_PLUGIN_CURRENT_VERSION && $key){
				wpm_check_license($key, true);
				$wpdb->query("UPDATE {$wpdb->prefix}options set 
								option_value='". WPM_PLUGIN_CURRENT_VERSION ."' 
								where option_name = 'wpm_6310_version_info'");
			}	
		}
	} 
}

if (!function_exists('wpm_check_license')) {
	function wpm_check_license($key, $autoUpdate = false)
	{
		global $wpdb;

		$db_key = get_option('wpm_6310_license_key');
		if(!$db_key){
			$wpdb->query($wpdb->prepare("INSERT INTO {$wpdb->prefix}options SET option_name = %s, option_value = %s", 'wpm_6310_license_key', "{$key}"));
			if(!$wpdb->insert_id) {
				$wpdb->query($wpdb->prepare("UPDATE {$wpdb->prefix}options SET option_value = %s where option_name = %s", "{$key}", 'wpm_6310_license_key'));
			}
		}else if($db_key != $key){
			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->prefix}options SET option_value = %s where option_name = %s", "{$key}", 'wpm_6310_license_key'));
		}
		
		if(!class_exists('ZipArchive')){
			$api_params = array(
				'edd_action' => 'activate_license',
				'license' => $key,
				'item_name' => urlencode('Team showcase supreme'),
				'url' => home_url(),
				'type' => 'wpm'
			);
			$url = "https://license.wpmart.org/";
			$response = wp_remote_post($url, array("body" => $api_params));
			$license_data = json_decode(wp_remote_retrieve_body($response));
	
			if (is_wp_error($response) || 200 !== wp_remote_retrieve_response_code($response)) {
				if (is_wp_error($response)) {
					$message = $response->get_error_message();
				} else {
					$message = __('An error occurred, please try again.');
				}
			} else {
				if (false === $license_data->success) {
					switch ($license_data->error) {
						case 'invalid_key':
							$message = __('<p class="wpm-error-message">Your have enter invalid license key.</p>');
							break;
						case 'site_inactive':
							$message = __('<p class="wpm-error-message">Your license is not active for this URL.</p>');
							break;
						default:
							$message = __('<p class="wpm-error-message">An error occurred, please try again.</p>');
							break;
					}
					return;
				}
			}
	
			if (!empty($message)) {
				echo $message;
				return;
			}
	
		
			if (!function_exists('download_url')) {
				require_once ABSPATH . 'wp-admin/includes/file.php';
				require_once(ABSPATH . 'wp-includes/pluggable.php');
			}
	
			$file_url = $license_data->download_url;
			$tmp_file = download_url($file_url);
			$filepath = ABSPATH . 'wp-content/plugins';
			WP_Filesystem();
			$unzipfile = unzip_file($tmp_file, $filepath);
	
			if (is_wp_error($unzipfile)) {
				echo '<p class="wpm-error-message">There was an error unzipping the file.</p>';
				return;
			} else {
				
				if(!$autoUpdate){
					echo "<p class='wpm-success-message'>Congratulations! Your license activated successfully.</p>";		
					wp_remote_post($url, array("body" => ['file_name' => $license_data->file_name]));
					return;
				}				
			}
			
		


			echo "<p style='font-size: 16px; color: red;'><b>Activation Error: </b> ZipArchive extension is not activated in your cPanel. Please check the video on how to activate it.</p>";
			echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/6Lv1psR94_A" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> <br /><br />';
			return;
		}
		
	

		$api_params = array(
			'edd_action' => 'activate_license',
			'license' => $key,
			'item_name' => urlencode('Team showcase supreme'),
			'url' => home_url(),
			'type' => 'wpm'
		);
		$url = "https://license.wpmart.org/";
		$response = wp_remote_post($url, array("body" => $api_params));
		$license_data = json_decode(wp_remote_retrieve_body($response));

		if (is_wp_error($response) || 200 !== wp_remote_retrieve_response_code($response)) {
			if (is_wp_error($response)) {
				$message = $response->get_error_message();
			} else {
				$message = __('An error occurred, please try again.');
			}
		} else {
			if (false === $license_data->success) {
				switch ($license_data->error) {
					case 'invalid_key':
						$message = __('<p class="wpm-error-message">Your have enter invalid license key.</p>');
						break;
					case 'site_inactive':
						$message = __('<p class="wpm-error-message">Your license is not active for this URL.</p>');
						break;
					default:
						$message = __('<p class="wpm-error-message">An error occurred, please try again.</p>');
						break;
				}
			}
		}

		if (!empty($message)) {
			echo $message;
			return;
		}

		if (!function_exists('download_url')) {
			require_once ABSPATH . 'wp-admin/includes/file.php';
			require_once(ABSPATH . 'wp-includes/pluggable.php');
		}
		$file_url = $license_data->download_url;
		$tmp_file = download_url($file_url);
		$filepath = WP_CONTENT_DIR . '/plugins';
		WP_Filesystem();
		copy($tmp_file, $filepath . "/{$license_data->file_name}");
		@unlink($tmp_file);

		$zip = new ZipArchive;
		$res = $zip->open($filepath . "/{$license_data->file_name}");
		if (!$res) {
			echo '<p class="wpm-error-message">There was an error unzipping the file.</p>';
		} else {
			$zip->extractTo($filepath . "/");
			$zip->close();
		
			if(!$autoUpdate){
				echo "<p class='wpm-success-message'>Congratulations! Your license activated successfully.</p>";		
			}				
		}
		wp_remote_post($url, array("body" => ['file_name' => $license_data->file_name]));
	}
}
