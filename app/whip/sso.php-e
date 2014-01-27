<?php
interface SSOInterface
{
	public function __construct($params);
	public function get_url();
	public function validate_token();
}

class WH_SSO implements SSOInterface{

	private $_config = array(
		"shared_secret" => "",
		"sso_url" => "",
		"task" => "/app/sso/custom/",
		//"task" => "/podium/Default.aspx?t=52841",
		"salt_key" => "wh_s",
		"return_key" => "rt_url",
		"vendor_key" => "vendorkey",
		"vendor" => "wsapi",
		"timeout"=> 60,
		"token_key"=> "wh_sso_login",
		"return_url" => "",
		"dev_sid" => "",
		"sign_out_return_url" =>"",
	);
 
	
	function __construct($params = array() ){
		$this->_config = array_merge($this->_config , $params);
	}

	function get_url() {

		$salt = substr(str_shuffle(str_repeat('abcdefghijklmnopqrstuvwxyz0123456789',5)),0,32);
	
		$rt_url =  $this->encrypt($this->_config['return_url'], $this->_config['shared_secret'], $salt, 8);
		
		$rt_url = urlencode($rt_url);
		$salt = urlencode($salt);
		$vendor = urlencode( $this->_config['vendor'] );
		$sep = (false === strrpos($rt_url, "?")) ? "&" : "?";		

		$login_url = $this->_config['sso_url'] . $this->_config['task'] ."?". $this->_config['salt_key'] . "=$salt&" . $this->_config['return_key'] . "=$rt_url&" . $this->_config['vendor_key'] . "=$vendor";
		if( $this->_config['dev_sid'] != "" ){
			$login_url .= "&dev_sid=". $this->_config['dev_sid'];
		}
		return $login_url;
	}

		function sign_out() {
		$sign_out = $this->_config["sso_url"] . "/app/sso/logout"; 

		if( $this->_config['sign_out_return_url'] !== "" ){
			
			$sign_out .= "?rt_url=".$this->_config['sign_out_return_url'];
		}

		
		return $sign_out;
	}

	function validate_token(){ //$token = false, $salt = false) {
		
		//$options = $this->options_obj->get();
		
		$wh_sso_shared_key = $this->_config['shared_secret'];
		
		$token =  $_GET[ $this->_config['token_key'] ];
		$salt =  $_GET[ $this->_config['salt_key'] ];
		if(!$token) return 0;
	
		
		$decryptedToken = $this->decrypt($token, $wh_sso_shared_key, $salt, 8);	
		
		$tokenParts = explode("||", $decryptedToken);
		$currentTime = time();
		
		$tokenTime = $tokenParts[2] * 1;
		
		if($currentTime - $tokenTime <= $this->_config['timeout'] ) {
		
			return array('userid'=> $tokenParts[0] , 'hostid'=> $tokenParts[1], 'timestamp'=> $tokenParts[2], 'username'=> $tokenParts[3], 'email'=> $tokenParts[4], 'firstname'=>$tokenParts[5], 'lastname'=> $tokenParts[6]);
		} else {
			return array(null,null,null,null);
		}
	}

	function decrypt($string_to_decrypt, $key, $iv, $keepingSigsSame) {
	    $string_to_decrypt = base64_decode($string_to_decrypt);
	
	    $rtn = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $string_to_decrypt, MCRYPT_MODE_CBC, $iv);
	    $rtn = rtrim($rtn, "\0\4");
	
	    return($rtn);
	}

	function encrypt($string_to_encrypt, $key, $iv, $keepingSigsSame) {
		
	    $rtn = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string_to_encrypt, MCRYPT_MODE_CBC, $iv);
	
	    $rtn = base64_encode($rtn);
	
	    return($rtn);
	} 

	

	function bool_val($in, $strict=false){
	    $out = null;
	    $in = (is_string($in)?strtolower($in):$in);
	    // if not strict, we only have to check if something is false
	    if (in_array($in,array('false','no', 'n','0','off',false,0), true) || !$in) {
	        $out = false;
	    } else if ($strict) {
	        // if strict, check the equivalent true values
	        if (in_array($in,array('true','yes','y','1','on',true,1), true)) {
	            $out = true;
	        }
	    } else {
	        // not strict? let the regular php bool check figure it out (will
	        //     largely default to true)
	        $out = ($in?true:false);
	    }
	    return $out;
	}


}


