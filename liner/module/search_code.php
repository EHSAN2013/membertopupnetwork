<?php 
require_once('../../config/connect.php');
require_once('../../config/function.php');
require_once('../setting.php');

$q = strtolower($_GET["q"]);
if (!$q) return;

$aq=queryx2("select sm_code,sm_name from system_member where sm_level!=9");
while(list($key,$value)=mysql_fetch_array($aq)){
	if (strpos(strtolower($key), $q) !== false) {
		echo "$key|$value\n";
	}
}

?>
