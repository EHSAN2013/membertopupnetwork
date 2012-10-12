<? session_start();

$host=$_SERVER['HTTP_HOST']; $locate_filehost= $_SERVER['PHP_SELF'];
// if($host=="localhost"){
	$hostname="127.0.0.1:8889";
	$dbsname="mb_topup";
	$username="root";
	$password="123456";
// }else{
// 	$hostname="localhost";
// 	$dbsname="thaimlmn_mbt";
// 	$username="thaimlmn_mbt";
// 	$password="x12345";
// }
mysql_connect($hostname,$username,$password);
mysql_select_db($dbsname)or die("Cannot access to ($host) @used DBname ($dbsname) by username $username; password $password; Please check your my_sql configuration!");
mysql_query("SET NAME UTF8");
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client='utf8' ");
mysql_query("SET character_set_connection='utf8' ");
mysql_query("collation_connection = utf8_unicode_ci");
mysql_query("collation_database = utf8_unicode_ci");
mysql_query("collation_server = utf8_unicode_ci");

require("function.php"); 
require("class.upload.php");

$fileExplod=explode("/",$locate_filehost);

if((!in_array("member",$fileExplod)) or (!in_array("liner",$fileExplod))){require('link_reply.php');} require("config.ini.php");

if($_SESSION['adminID']!=""){$adminid=$_SESSION['adminID'];}
if($_SESSION['memberID']!=""){$memberid=$_SESSION['memberID'];}
?>