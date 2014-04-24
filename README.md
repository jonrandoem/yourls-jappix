yourls-jappix
============

About
------------

yourls-jappix is a plugin for [YOURLS](http://yourls.org/). The plugin adds a [JappixMini](https://project.jappix.com/) chat on your Yourls admin pages.

Obviously, you need a valid Yourls installation and a valid Jappix installation.

This plugin has been tested on Yourls:
* [1.7](https://github.com/YOURLS/YOURLS/releases/tag/1.7)


Installation
------------

1. Unzip the plugin. You get a "yourls-jappix" folder
2. Upload this folder into the user/plugins folder of your Yourls installation
3. Edit your config.php file (located at user/config.php in your Yourls installation)
4. Define the URL of your Jappix installation by inserting the following line at the end of your config.php file. Adapt the URL "https://static.jappix.com" to your Jappix installation's URL (No trailing slash !!!), and save changes to config.php
5. Define more options, like the example below:

```
// Enable the service
// default: false
define('JAPPIX_ENABLE', true);

// Enable JappixMini only for logged users
// Jappix won't show on the login page with this set to true
// default: false
define('JAPPIX_ENABLE_FOR_LOGGED', true);

// The Jappix server's URL. No trailing slash !!! And no final /php (it will be added for you) !
// default: 'https://static.jappix.com'
define('JAPPIX_URL', 'https://static.jappix.com');

// Define the lang for Jappix
// Choose one of the following:
// ar bg cs de en eo es et fa fr he hu id it ja la lb
// mn nl oc pl pt-br pt ru sk sv tr uk zh-cn zh-tw
// default: 'en'
define('JAPPIX_LANG', 'fr');

// Define the resource (as in 'What kind of resource is talking to Jappix?').
// Choose any string you want.
// default: 'Yourls'
define('JAPPIX_RESOURCE', 'Yourls');

// Define the the domain for your connection
// default: 'anonymous.jappix.com'
define('JAPPIX_DOMAIN', 'anonymous.jappix.com');

// Use the option below to disable anonymous mode
// default: false
define('JAPPIX_AUTH', true);

// With JAPPIX_AUTH to true, you can enable login with user and password
// On Jappix and Jabber in general, a login is like an email: user@domain.com
// Here, the user part is defined below,
// and the domain part is defined by JAPPIX_DOMAIN
// default: ''
define('JAPPIX_USER', 'dave');
// default: ''
define('JAPPIX_PASSWORD', 'secret');

// Auto-connect? Should work in anonymous or logged modes
// default: false
define('JAPPIX_AUTOCONNECT', true);

// Define your Jappix Nickname
// if not defined or if equals to "", a random nickname will be chosen
// default: ''
define('JAPPIX_NICKNAME', 'davZ');

// Animate JappixMini?
// Note that the animation only occurs if $jappixAutoConnect equals false
// and if $jappixGroupChats is an empty array or is not defined.
// default: false
define('JAPPIX_ANIMATE', true);

// Define the error URL (URL of the link that will be displayed if connection fails
// If not defined, it defaults to 'https://mini.jappix.com/issues'
// default: 'https://mini.jappix.com/issues'
define('JAPPIX_ERROR_LINK', 'https://mini.jappix.com/issues');

// Disable JappixMini on mobile devices?
// default: false
define('JAPPIX_DISABLE_MOBILE', true);

// Group chats to join at launch (you must provide an array of strings here)
// default: array()
$jappix_groupchats = array("support@muc.jappix.org");
```

Finally, activate the plugin in the admin area



License
------------

This theme is licensed under [MIT License](https://github.com/jonrandoem/yourls-jappix/blob/master/LICENSE).
