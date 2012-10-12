<? include('../config/connect.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<? echo mysql_query("ALTER TABLE `system_allsale_list` ADD `sas_per` VARCHAR( 3 ) NOT NULL AFTER `sas_date` ;")or die(mysql_error());
echo mysql_query("ALTER TABLE `system_allsale` ADD `sal_point` INT( 11 ) NOT NULL AFTER `sal_pcut` ;")or die(mysql_error());
echo mysql_query("ALTER TABLE `system_allsale` ADD `sal_per` INT NOT NULL AFTER `sal_point` ;")or die(mysql_error());?>
</body>
</html>