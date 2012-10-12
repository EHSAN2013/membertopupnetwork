<?php 
require_once('../../config/connect.php');
require_once('../../config/function.php');
require_once('../setting.php');

$q = strtolower($_GET["q"]);
if (!$q) return;

$aq=queryx2("select system_member.sm_name,system_member.sm_code from system_liner left join system_member on system_member.sm_id=system_liner.sli_sr_reply where system_member.sm_level!=9");
while(list($key,$value)=mysql_fetch_array($aq)){
	if (strpos(strtolower($key), $q) !== false) {
		echo "$key|$value\n";
	}
}

?>
