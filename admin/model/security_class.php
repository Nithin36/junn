<?php
require_once("pagenation_class.php");

class security_class extends pagenation_class
{
	function __construct()
{
$pagenation=new pagenation_class();
}


function filter_html_enities($txt)
{
    $txt=addslashes($txt);
	$txt2=htmlentities(stripslashes($txt));
	return $txt2;
}

function post_data_all_filled($post)
{
	
	$resarr=array();
	$i=0;
	foreach ($post as $key => $value)  {

            if($value=="")
			{
                
			$resarr[$i]=$key;	
        }
		$i=$i+1;
}


 $count=count($resarr);
return $count;

}


function post_data_some_filled($post,$str)
{
	$arr=explode(",",$str);
   
	$resarr=array();
	$i=0;
        $status="no";
	foreach ($post as $key => $value)  {

            if($value==" ")
			{
                for($j=0;$j<=count($arr);$j++)
                {
                   
                    if($key==$arr[$j])
                    {
                         $status="yes";
                       
                    }
                    
                }
                if($status=="no")
                {
                    $resarr[$i]=$key; 
                }
                
				
        }
		$i=$i+1;
}

$count=count($resarr);
return $count;

}
function check_number_all($str)
{
	$status="no";
	if (ctype_digit($str))
	{
		$status="yes";
	}
	return $status;
}


function check_string_all($str)
{
    
	$status="no";
	 if (ctype_space($str)) {
            
	if (!preg_match('/[^A-Za-z]/', $str))
	{
		$status="yes";
		
	}
         }
 else {
    
       $str=preg_replace('/\s+/', '', $str);
     if (!preg_match('/[^A-Za-z]/', $str))
	{
		$status="yes";
		
	}
 }
	return $status;
	

}

function check_alphanumeric($str)
{
	$status="no";
	if (ctype_alnum($str))
	{
		$status="yes";
	}
	return $status;
}
function minimum_String($str,$length)
{
    $nlength=  strlen($str);
    $status="no";
    if(($nlength==$length)||($nlength>$length))
    {
        $status="yes";
    }
    return $status;
}

function validate_email($str)
{
    $status="yes";
    if (!filter_var($str, FILTER_VALIDATE_EMAIL)) {
 $status="no"; 
}
return $status;
}

function check_strings_match($str1,$str2)
{
    $status="no";
    if($str1==$str2)
    {
       $status="yes"; 
    }
    return $status;
}

function check_url_correct($url)
{
    $status="";
  $regex = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";   
if(!filter_var($url, FILTER_VALIDATE_URL))
  {
echo $status="yes";  
}  
else { 
   echo $status="no";  
} 
return $status;
}



function stripslahes_rows($post)
{
    
    if (!empty($post)) {

    //print_r($post);
    foreach($post as $key => $value)
{
      $post[$key];
       $value=stripcslashes(nl2br($value));
          $post[$key]=$value;
}
    }
return $post;
}



function escapestring_rows($post)
{
    
    if (!empty($post)) {

    //print_r($post);
    foreach($post as $key => $value)
{
      $post[$key];
      //$value=mysql_escape_string($value);
          $post[$key]=$value;
}
    }
return $post;
}

function encrypt($pure_string, $encryption_key) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
    return $encrypted_string;
}

/**
 * Returns decrypted original string
 */
function decrypt($encrypted_string, $encryption_key) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryption_key, $encrypted_string, MCRYPT_MODE_ECB, $iv);
    return $decrypted_string;



}


function encryptor($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    //pls set your unique hashing key
    $secret_key = 'pankaj';
    $secret_iv = 'pankaj23';

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    //do the encyption given text/string/number
    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string,$encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
    	//decrypt the given text/string/number
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}



function mc_encrypt($encrypt, $key){
    $encrypt = serialize($encrypt);
    $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC), MCRYPT_DEV_URANDOM);
    $key = pack('H*', $key);
    $mac = hash_hmac('sha256', $encrypt, substr(bin2hex($key), -32));
    $passcrypt = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $encrypt.$mac, MCRYPT_MODE_CBC, $iv);
    $encoded = base64_encode($passcrypt).'|'.base64_encode($iv);
    return $encoded;
}

// Decrypt Function
function mc_decrypt($decrypt, $key){
    $decrypt = explode('|', $decrypt.'|');
    $decoded = base64_decode($decrypt[0]);
    $iv = base64_decode($decrypt[1]);
    if(strlen($iv)!==mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)){ return false; }
    $key = pack('H*', $key);
    $decrypted = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $decoded, MCRYPT_MODE_CBC, $iv));
    $mac = substr($decrypted, -64);
    $decrypted = substr($decrypted, 0, -64);
    $calcmac = hash_hmac('sha256', $decrypted, substr(bin2hex($key), -32));
    if($calcmac!==$mac){ return false; }
    $decrypted = unserialize($decrypted);
    return $decrypted;
}




function encrypt2($value,$key){
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    return mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $value, MCRYPT_MODE_ECB, $iv);
}

function decrypt2($value,$key){
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $value, MCRYPT_MODE_ECB, $iv));
}
}
	?>