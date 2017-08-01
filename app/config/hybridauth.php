<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| HybridAuth settings
| -------------------------------------------------------------------------
| Your HybridAuth config can be specified below.
|
| See: https://github.com/hybridauth/hybridauth/blob/v2/hybridauth/config.php
*/
$config['hybridauth'] = array(
  "providers" => array(
    // openid providers
    "OpenID" => array(
      "enabled" => FALSE,
    ),
    "Yahoo" => array(
      "enabled" => FALSE,
      "keys" => array("id" => "", "secret" => ""),
    ),
    "AOL" => array(
      "enabled" => FALSE,
    ),
    "Google" => array(
      "enabled" => TRUE,
      "keys" => array("id" => "575482260082-uu9ptalnji4bg6hr6ue47pt2gcqmnh5d.apps.googleusercontent.com", "secret" => "z-wO_-R8JQZAA0V_gPTJr_gj"),
    ),
    "Facebook" => array(
      "enabled" => TRUE,
      "keys" => array("id" => "1936155050006768", "secret" => "2da6237b1a18b750d240b0f538f45226"),
      "trustForwarded" => TRUE,
    ),
    "Twitter" => array(
      "enabled" => TRUE,
      "keys" => array("key" => "GVRbSF9PIP23AHZDNVA6LmSrP", "secret" => "XQhhE3WWbmWBU4UIosNwTiJaEN4PeXqEIoMOjby5yhSM7gnv2q"),
      "includeEmail" => TRUE,
    ),
    "Live" => array(
      "enabled" => FALSE,
      "keys" => array("id" => "", "secret" => ""),
    ),
    "LinkedIn" => array(
      "enabled" => FALSE,
      "keys" => array("id" => "", "secret" => ""),
      "fields" => array(),
    ),
    "Foursquare" => array(
      "enabled" => FALSE,
      "keys" => array("id" => "", "secret" => ""),
    ),
	"Instagram" => array(
	  "enabled" => TRUE,
	  "keys" => array("id" => "your client id", "secret" => "your secret key")
	),
  ),
  // If you want to enable logging, set 'debug_mode' to true.
  // You can also set it to
  // - "error" To log only error messages. Useful in production
  // - "info" To log info and error messages (ignore debug messages)
  "debug_mode" => ENVIRONMENT === 'development',
  // Path to file writable by the web server. Required if 'debug_mode' is not false
  "debug_file" => APPPATH . 'logs/hybridauth.log',
);
