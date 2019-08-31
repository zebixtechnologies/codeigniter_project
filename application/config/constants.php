<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');
define('SITE_NAME',					'Key Verticals');
define('SITE_CUSTOMER_CARE',			'1800-256-456');
define('ADMIN_MAIL',			'support@keyverticals.com');
define('ADMIN_MAIL_PASSWORD',			'B%j~^kW@_ad_');
define('COOKIE_EXPIRE_TIME',			'86500');
define('CUSTOMER_SUPPORT',				'admin@keyverticals.com');
define('ADMIN_NAME',				'Admin');
define('ADVER_LOGO_HEIGHT',				'100');
define('ADVER_LOGO_WIDTH',				'150');
define('SITE_CURRENCY','₦');
define('LEAD_COST','200');
define('MINIMUM_BID_PRICE' , "100");
define('HOME_INSURANCE','44');
define('AUTO_INSURANCE','38');
define('LIFE_INSURANCE','45');
define('BUSINESS_INSURANCE','46');
define("TRAVEL_INSURANCE" , "47");
define("Education_INSURANCE" , "49");
define("PAYDAY_LOAN","41");
define("AUTO_QUOTES","55");
define("CAR_LOAN","56");
define("HOTELS","48");
define("Health_insurance","43");
define("THIRD_PARTY_ONLY","57");
define("SMS_USER_NAME","Emmerlee");
define("SMS_PASSWORD","Chinex_123");
define("SMS_SENDER","KeyVertical");
/* End of file constants.php */
/* Location: ./application/config/constants.php */