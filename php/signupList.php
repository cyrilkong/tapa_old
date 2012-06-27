<?
	if($_GET['pwd'] != 'helloiamtwopatchadminiwanttofuckingaccesstothislist'){
		exit();
	}

?>

<html>
	<header>
	</header>
	<body>

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

	mysqlInit();
	$sql = sprintf("SELECT `company_name`, `contact_name`, `email`, `phone`, `signup_time`, `ip_address` FROM `signup_merchant`;");
	$r = mysqlQuery($sql);
	if(mysql_num_rows($r) > 0) {
		while($data = mysql_fetch_array($r, MYSQL_ASSOC)){
			echo 
			'<div>' . 
				'<div style="position:relative;float:left;width:200px;background-color:#FFCCCC">' . $data['company_name'] . '</div>' .
				'<div style="position:relative;float:left;width:200px;background-color:#FFFFCC">' .$data['contact_name'] . '</div>' .
				'<div style="position:relative;float:left;width:300px;background-color:#FFCCCC">' .$data['email'] . '</div>' .
				'<div style="position:relative;float:left;width:100px;background-color:#FFFFCC"">' .$data['phone'] . '</div>' .
				'<div style="position:relative;float:left;width:150px;background-color:#FFCCCC">' .$data['signup_time'] . '</div>' .		
				'<div style="position:relative;float:left;width:150px;background-color:#FFFFCC"">' .$data['ip_address'] .  '</div>' .
				'<div style="clear:both"></div>'.
			'</div>';
		}
	}
		

?>
	</body>
</html>