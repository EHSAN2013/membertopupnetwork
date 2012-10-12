<? include("config/function.php");?>
<h1>strtotime function</h1>

<?php
echo "strtotime('now') = ".strtotime("now"), "<br>";
echo "strtotime('".date("Y-m-d")."') = ".strtotime(date("Y-m-d")), "<br>";
echo "strtotime('+1 day') = ".strtotime("+1 day"), "<br>";
echo "strtotime('+1 week') = ".strtotime("+1 week"), "<br>";
echo "strtotime('+1 week 2 days 4 hours 2 seconds') = ".strtotime("+1 week 2 days 4 hours 2 seconds"), "<br>";
echo "strtotime('next Thursday') = ".strtotime("next Thursday"), "<br>";
echo "strtotime('last Monday') = ".strtotime("last Monday"), "<br>";
?>

<br><hr/><br>
<h1>datediff function</h1>

<?
$expire=date("Y-m-d H:i:s");
$realdates=date("Y-m-d",strtotime("-1 week")); //ย้อนหลัง 1 สัปดาห์ เพิ่มจำนวนได้ที่ -1 week, day, month, year ตาม patern
$realdatee=date("Y-m-d",time());
$dexpr=round(DateDiff($expire,"2012-09-14 23:17:41"));

echo "expire = ".$expire,"<br>";
echo "realdates = ".$realdates,"<br>";
echo "realdatee = ".$realdatee,"<br>";
echo "dexpr = ".$dexpr,"<br>";
echo "strtotime(2012-09-14) = ".strtotime(2012-09-14),"<br>";
echo "strtotime(1970-01-01) = ".strtotime(1970-01-01),"<br>";
?>

<br><hr/><br>
<h1>strtotime show</h1>

<?php
$str = 'Not Good';

// previous to PHP 5.1.0 you would compare with -1, instead of false
if (($timestamp = strtotime($str)) === false) {
    echo "The string ($str) is bogus";
} else {
    echo "$str == " . date('l dS \o\f F Y h:i:s A', $timestamp);
}
?>
