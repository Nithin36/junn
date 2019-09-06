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
define('SERVERMAIL','noreply@junaidperfumes.in');
define('ENQUIRYSUBJECT','Junaid- Enquiry');
define('ENQUIRYSUBJECT2','Enquiry to Junaid');

define('CUSTOMERORDER','Junaid- Customer Order');
define('CUSTOMERORDER2','Customer Order to Junaid');

define('SELLERORDER','Junaid - Your order details');
define('SELLERORDER2','Junaid - Your order details');
define('JOBSUBJECT','Jupiter- Apply Job');
define('JOBSUBJECT2','Job application to Jupiter');
define('JOBMAILTEMPLATE',' Jupiter Job application from');
define('ENQUIRYMAILTEMPLATE',' Jupiter - Enquiry  From ');
define('FORGOTSUBJECT','Junaid- Forgot password');
define('FORGOTSUBJECT2','Forgot password from Junaid');
define('FORGOTMAILTEMPLATE',' Junaid -  Password  of ');

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


/* End of file constants.php */
/* Location: ./application/config/constants.php */