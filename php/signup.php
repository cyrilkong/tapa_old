<?php
	$CONFIG['mysql_host'] = 'tapa.db.8756045.hostedresource.com';//'localhost:8889';
	$CONFIG['mysql_db'] = 'tapa';//'tapa_website';      // undefined until db server is setup. 
	$CONFIG['mysql_user'] = 'tapa';//'root';    // undefined until db server is setup.
	$CONFIG['mysql_passwd'] = 'Tw0.Patch';  // undefined until db server is setup.

	$MAX_REG_COUNT = 5;
	function mysqlInit() {
		global $CONFIG;
		static $mysql = NULL;
		if(!$mysql) {
			$mysql = mysql_connect($CONFIG['mysql_host'],$CONFIG['mysql_user'],$CONFIG['mysql_passwd']);
			if(!$mysql) exit(mysql_error($mysql));
			mysql_select_db($CONFIG['mysql_db']);
			mysql_query('SET NAMES utf8');
		}
		return $mysql;
	}
	
	function mysqlQuery($qstr) {
		$r = mysql_query($qstr);
		if($r) {
			return $r;
		}else{
			echo mysql_error();
		}
	}

	function getIPAddress(){
		$ip = null;
		if (!empty($_SERVER['HTTP_CLIENT_IP'])){   //check ip from share internet
		  $ip=$_SERVER['HTTP_CLIENT_IP'];
		}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
		  $ip=$_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
	
	$email = $_POST['signupEmail'];	
	$companyName = $_POST['signupCompany'];
	$contactName = $_POST['signupContact'];
	$phone = $_POST['signupPhone'];
	$ip = getIPAddress();

	if(!empty($email) && !empty($companyName) && !empty($contactName) && !empty($phone)){
		mysqlInit();
		$sql = sprintf("SELECT count(`ip_address`) FROM `signup_merchant` WHERE `ip_address` = '%s';",
			mysql_real_escape_string($ip)
		);
	
		$r = mysqlQuery($sql);
		$regCount = 0;
		if(mysql_num_rows($r) == 1) {
			if($data = mysql_fetch_array($r, MYSQL_ASSOC)){
				$regCount = $data['count(`ip_address`)'];
			}
		}
		
		if($regCount < $MAX_REG_COUNT){
			$sql = sprintf("INSERT INTO `signup_merchant` (`email`, `company_name`, `contact_name`, `phone` , `ip_address`) VALUES ('%s', '%s', '%s', '%s', '%s');",
				mysql_real_escape_string($email),
				mysql_real_escape_string($companyName),
				mysql_real_escape_string($contactName),
				mysql_real_escape_string($phone),
				mysql_real_escape_string(getIPAddress())
			);
				
			if(mysqlQuery($sql, true) && mysql_affected_rows() == 1){
				$output['success'] = 1;
				exit(json_encode($output));
			}
		}else{
			$output['success'] = 2;
			$output['reason'] = 'you have registered too many times!';				
			exit(json_encode($output));
		}
	}else{
		$output['success'] = 3;
		$output['reason'] = 'missing para' . $email. $companyName . $contactName . $phone;	
		exit(json_encode($output));		
	}
	$output['success'] = 4;
	$output['reason'] = 'Please try again later.';	
	exit(json_encode($output));
?>