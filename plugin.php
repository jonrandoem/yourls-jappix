<?php
/**
Plugin Name: JappixMini chat on admin pages
Plugin URI: https://github.com/jonrandoem/yourls-jappix
Description: Add <a href="http://jappix.org/">JappixMini</a> to Yourls admin pages
Version: 1.0
Author: JonRandoem
Author URI: https://github.com/jonrandoem/
**/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

yourls_add_action( 'admin_init', 'jr_yourls_jappix' );

function jr_yourls_jappix( $args ) {
	yourls_add_action( 'html_footer', 'jr_yourls_jappix_footer' );
}

function jr_yourls_jappix_footer( $args ) {
	if (defined('JAPPIX_ENABLE') && JAPPIX_ENABLE === true) {

		$url = "";
		if ( defined('JAPPIX_URL') && JAPPIX_URL != "" ) {
			$url .= JAPPIX_URL;
		} else {
			$url .= "https://static.jappix.com";
		}
		$url .= '/php/get.php?l=';
		$langs = array('ar', 'bg', 'cs', 'de', 'en', 'eo', 'es', 'et', 'fa', 'fr', 'he', 'hu', 'id', 'it', 'ja', 'la', 'lb', 
										'mn', 'nl', 'oc', 'pl', 'pt-br', 'pt', 'ru', 'sk', 'sv', 'tr', 'uk', 'zh-cn', 'zh-tw');
		if ( defined('JAPPIX_LANG') && in_array(JAPPIX_LANG, $langs) ) {
			$url .= JAPPIX_LANG;
		} else {
			$url .= 'en';
		}
		$url .= '&t=js&g=mini.xml';

		$autoconnect = ( defined('JAPPIX_AUTOCONNECT') && JAPPIX_AUTOCONNECT == true ) ? 'true' : 'false';

		$animate = ( defined('JAPPIX_ANIMATE') && JAPPIX_ANIMATE == true ) ? 'true' : 'false';

		$domain = ( defined('JAPPIX_DOMAIN') && JAPPIX_DOMAIN != "" ) ? JAPPIX_DOMAIN : 'jappix.com';

		$paramStr = $autoconnect . ', ' . $animate . ', "' . $domain . '"';
		if ( defined('JAPPIX_AUTH') && JAPPIX_AUTH == true && defined('JAPPIX_USER') && defined('JAPPIX_PASSWORD') ) {
			$paramStr .= ', "' . JAPPIX_USER . '", "' . JAPPIX_PASSWORD . '"';
		}

		/*
		$groupChats = '';
		if ( defined('JAPPIX_GROUPCHATS') && is_array(JAPPIX_GROUPCHATS) ) {
			$groupChats .= 'MINI_GROUPCHATS = ["' . implode('", "', JAPPIX_GROUPCHATS) . '"];';
		}
		*/

		echo <<<JAPPIX

		<script type="text/javascript">
			jQuery.ajaxSetup({cache: true});
			jQuery.getScript("$url", function() {
				$groupChats
				launchMini($paramStr);
			});
		</script>

JAPPIX;
	}
}