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

		$domain = ( defined('JAPPIX_DOMAIN') && JAPPIX_DOMAIN != "" ) ? JAPPIX_DOMAIN : 'jappix.com';

		$paramStr = $autoconnect . ', true, "' . $domain . '"';
		if ( defined('JAPPIX_AUTH') && JAPPIX_AUTH == true && defined('JAPPIX_USER') && defined('JAPPIX_PASSWORD') ) {
			$paramStr .= ', "' . JAPPIX_USER . '", "' . JAPPIX_PASSWORD . '"';
		}

		$animate = ( defined('JAPPIX_ANIMATE') && JAPPIX_ANIMATE == true ) ? 'MINI_ANIMATE = true;' : 'MINI_ANIMATE = false;';

		$nick = ( defined('JAPPIX_NICKNAME') && JAPPIX_NICKNAME != "" ) ? 'MINI_RANDNICK = false; MINI_NICKNAME = "' . JAPPIX_NICKNAME . '";' : 'MINI_RANDNICK = true;';

		$resource = ( defined('JAPPIX_RESOURCE') && JAPPIX_RESOURCE != "" ) ? 'MINI_RESOURCE = "' . JAPPIX_RESOURCE . '";' : '';

		$error = ( defined('JAPPIX_ERROR_LINK') && JAPPIX_ERROR_LINK != "" ) ? 'MINI_ERROR_LINK = "' . JAPPIX_ERROR_LINK . '";' : 'MINI_ERROR_LINK = "https://mini.jappix.com/issues"';

		$disableMobile = ( defined('JAPPIX_DISABLE_MOBILE') && JAPPIX_DISABLE_MOBILE == true ) ? 'MINI_DISABLE_MOBILE = true;' : 'MINI_DISABLE_MOBILE = false;';

		$groupChats = '';
		if ( isset($jappix_groupchats) && is_array($jappix_groupchats) ) {
			$groupChats .= 'MINI_GROUPCHATS = ["' . implode('", "', $jappix_groupchats) . '"];';
		}

		echo <<<JAPPIX

		<script type="text/javascript">
			jQuery.ajaxSetup({cache: true});
			jQuery.getScript("$url", function() {
				$groupChats
				$animate
				$nick
				$res
				$error
				$disableMobile
				launchMini($paramStr);
			});
		</script>

JAPPIX;
	}
}