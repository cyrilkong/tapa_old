<?php
$realm = 'Restricted area';

$users = array('tapa' => '123456789987654321');

if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Digest realm="'.$realm.
           '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($realm).'"');
    die('Fail to login');
}
// analyze the PHP_AUTH_DIGEST variable
if (!($data = http_digest_parse($_SERVER['PHP_AUTH_DIGEST'])) ||
    !isset($users[$data['username']]))
    die('Wrong Credentials!');
    
// generate the valid response
$A1 = md5($data['username'] . ':' . $realm . ':' . $users[$data['username']]);
$A2 = md5($_SERVER['REQUEST_METHOD'].':'.$data['uri']);
$valid_response = md5($A1.':'.$data['nonce'].':'.$data['nc'].':'.$data['cnonce'].':'.$data['qop'].':'.$A2);

if ($data['response'] != $valid_response)
    die('Wrong Credentials!');
//echo 'You are logged in as: ' . $data['username'];

function http_digest_parse($txt)
{
    // protect against missing data
    $needed_parts = array('nonce'=>1, 'nc'=>1, 'cnonce'=>1, 'qop'=>1, 'username'=>1, 'uri'=>1, 'response'=>1);
    $data = array();
    $keys = implode('|', array_keys($needed_parts));

    preg_match_all('@(' . $keys . ')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $txt, $matches, PREG_SET_ORDER);

    foreach ($matches as $m) {
        $data[$m[1]] = $m[3] ? $m[3] : $m[4];
        unset($needed_parts[$m[1]]);
    }

    return $needed_parts ? false : $data;
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
				'<div style="position:relative;float:left;width:200px;background-color:#FFFCCC">' . $data['company_name'] . '</div>' .
				'<div style="position:relative;float:left;width:200px;background-color:#FFFFCC">' .$data['contact_name'] . '</div>' .
				'<div style="position:relative;float:left;width:300px;background-color:#FFFCCC">' .$data['email'] . '</div>' .
				'<div style="position:relative;float:left;width:100px;background-color:#FFFFCC"">' .$data['phone'] . '</div>' .
				'<div style="position:relative;float:left;width:150px;background-color:#FFFCCC">' .$data['signup_time'] . '</div>' .		
				'<div style="position:relative;float:left;width:150px;background-color:#FFFFCC"">' .$data['ip_address'] .  '</div>' .
				'<div style="clear:both"></div>'.
			'</div>';
		}
	}
		

?>
	</body>
</html>