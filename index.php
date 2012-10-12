<? include("config/connect.php"); $page=$_GET['page']; ?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$title_bar;?></title>
<meta name="keywords" content="<?=$keywords;?>">
<meta name="description" content="<?=$description_detail;?>">

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="css/YUI-cssreset-min.css" media="all">
<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
<link rel="stylesheet" type="text/css" href="css/product.css" media="all">
<link rel="stylesheet" type="text/css" href="css/global.css" media="all">
<link rel="stylesheet" type="text/css" href="css/style-newsticker.css">
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen">
<!-- CSS -->

<!-- JS -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/supermarket_400.font.js"></script>
<script type="text/javascript" src="js/slides.min.jquery.js"></script>
<script type="text/javascript" src="js/jcarousellite_1.0.1c4.js"></script>
<script type="text/javascript" src="js/jquery.calculation.min.js" ></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<!-- JS -->

</head>

<body Onload="JavaScript:doCallAjax('');">
<div id="wrapper">
  <div id="header">
    <div id="logo"></div>
    <div id="callcenter"></div>
  </div>
  <div id="navigator">
    <ul class="navi_list">
      <li><a href="index.php" class="first <?=$page==""?"action_01":"";?>">หน้าแรก</a></li>
      <li><a href="index.php?page=aboutus" class="line <?=$page=="aboutus"?"action_01":"";?>">เกี่ยวกับเรา</a></li>
      <li><a href="index.php?page=oppatunity" class="line <?=$page=="oppatunity"?"action_01":"";?>">โอกาสทางธุรกิจ</a></li>
      <li><a href="index.php?page=faq" class="line <?=$page=="faq"?"action_01":"";?>">คำถามที่พบบ่อย</a></li>
      <li><a href="index.php?page=contactus" class="line <?=$page=="contactus"?"action_01":"";?>">ติดต่อเรา</a></li>
      <li><a href="index.php?page=products" class="line <?=$page=="products"?"action_01":"";?>">อุปกรณ์ส่งเสริมการตลาด</a></li>
      <li><a href="index.php?page=testimonials" class="line <?=$page=="testimonials"?"action_01":"";?>">Testimonials</a></li>
    </ul>
  </div>
  <div id="slider">
  <? include("slider.php"); ?>
  </div>
  <div id="main">
  <!-- Main include script -->
  <?
  switch($page){
	  case 'registation':		  include("regis_form.php");			    break;
	  case 'products':			  include("products.php");			      break;
	  case 'products_list':		include("products_list.php");		    break;
	  case 'products_detail':	include("products_detail.php");		  break;
	  case 'productorder':		include("products_order.php");		  break;
	  case 'addtocart':			  include("products_addtocart.php");	break;
	  case 'payment':			    include("products_payment.php");	  break;
	  case 'oppatunity':		  include("webpage.php");				      break;
	  case 'testimonials':		include("webpage.php");				      break;
	  case 'meetingcalendar':	include("webpage.php");				      break;
	  case 'faq':				      include("webpage.php");				      break;
	  case 'promotion':			  include("webpage.php");				      break;
	  case 'contactus':			  include("webpage.php");				      break;
	  case 'aboutus':			    include("webpage.php");				      break;
	  case 'news_list':			  include("news_list.php");			      break;
	  case 'news_detail':		  include("news_detail.php");			    break;
	  case 'login':				
      echo "<script>window.location='member/index.php';</script>";	
	  	break;
	  default:					      include("default.php");
  }
  ?>
  <!-- Main include script -->
  </div>
  <div class="clear"></div>
  <!--<div align="right" style="margin-top:10px;"> <<< Insert Histats Code HERE! >>> </div>-->
  <div id="footer">Copyright © 2012 All Right Reserved www.membertopupnetwork.com, Power by Thailandwebmarketing.com</div>
</div>
</body>
</html>