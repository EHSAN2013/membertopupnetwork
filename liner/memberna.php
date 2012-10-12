<? require_once('../config/connect.php'); require_once('setting.php'); $link=$_SERVER['PHP_SELF']; $page=$_GET['page'];

$smid=$memberid;
$smco=$_SESSION['smco'];
$smle=$_SESSION['smle'];

$chj=queryx1("select sli_sr_reply from system_liner where sli_sr_reply='".$smid."' limit 1");

if($chj['sli_sr_reply']==$smid){?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$www;?></title>

<link rel="stylesheet" media="screen" HREF="css/reset.css" />
<link rel="stylesheet" media="screen" HREF="css/style.css" />
<link rel="stylesheet" media="screen" HREF="css/messages.css" />
<link rel="stylesheet" media="screen" HREF="css/forms.css" />
<link rel="stylesheet" media="screen" HREF="css/tables.css" />
<link rel="stylesheet" href="css/jquery.treeview.css" type="text/css" />
<!--<link rel="stylesheet" type="text/css" href="css/jqueryui/jquery-ui-1.8.16.custom.css"/>-->
<!--<link rel="stylesheet" type="text/css" href="css/demo_table_jui.css"/>-->

<link rel="stylesheet" media="screen" HREF="css/pricing.css" />

<link rel="stylesheet" type="text/css" href="css/custom-style.css" />
<!-- Ranginput -->
<link rel="stylesheet" type="text/css" href="css/ranginput.css" />
<!-- Autocomplete -->
<link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css" />


<script type="text/javascript" src="js/jquery-1.6.4.js"></script>
<!-- jquery.Autocomplete -->
<script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
<!-- Height chart -->
<script type="text/javascript" src="highcharts/js/highcharts.js"></script>
<script type="text/javascript" src="highcharts/js/modules/exporting.js"></script>
<!-- html5 js -->
<script SRC="js/html5.js"></script>
<!-- jquerytools -->
<script src="http://cdn.jquerytools.org/1.2.6/tiny/jquery.tools.min.js"></script>
<script src="http://cdn.jquerytools.org/1.2.6/form/jquery.tools.min.js"></script>
<!--<script SRC="js/jquery.tools.min.js"></script>-->
<script SRC="js/jquery.tables.js"></script>
<!--<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>-->
<!--[if lte IE 9]>
<link rel="stylesheet" media="screen" href="css/ie.css" />
<script type="text/javascript" src="js/ie.js"></script>
<![endif]-->
<script type="text/javascript" src="js/jquery.treeview.js"></script>
<script type="text/javascript" src="js/global.js"></script>
<script type="text/javascript" src="js/member.js"></script>

<script SRC="js/pricing.js"></script>

<? if($page=="checkline"){?>
<link rel="stylesheet" href="module/org_chart/css/jquery.jOrgChart.css"/>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script src="module/org_chart/jquery.jOrgChart.js"></script>
<script>
jQuery(document).ready(function() {
	$(".widget").hide();				
	$(".widget").fadeIn(2000);
	$("#org").jOrgChart({
		chartElement : '#chart',
		dragAndDrop  : false
	});
});
</script>
<? }?>

</head>
<body>
    
    <div id="wrapper">
        <header id="page-header">
            <div class="wrapper">
                <div id="util-nav">
                    <ul>
                        <li>เข้าสู่ระบบโดย <?=readname("sm_name","system_member","sm_id",$smid);?>:</li>
                        <li><a href="../../">หน้าแรกเว็บไซต์</a></li>
                        <li><a href="../member/index.php">จัดการเว็บไซต์</a></li>
                        <li><a href="<?=$link;?>?page=logout">ออกจากระบบ</a></li>
                    </ul>
                </div>
                <h1>ระบบเช็คสายงาน <?=$www;?></h1>
                <div id="main-nav">
                    <ul class="clearfix">
                        <li <? if($page==""){?>class="active"<? }?>><a HREF="<?=$link;?>">ข้อมูลส่วนตัว</a></li>
                        <li <? if($page=="checkline"){?>class="active"<? }?>><a HREF="<?=$link;?>?page=checkline">เช็คสายงาน</a></li>
                        <li <? if($page=="pvpay"){?>class="active"<? }?>><a HREF="<?=$link;?>?page=pvpay">ดูรายได้</a></li>
                        <li <? if($page=="renew"){?>class="active"<? }?>><a HREF="<?=$link;?>?page=renew">รักษายอดสมาชิก</a></li>
                        <?php /*?><li <? if($page=="pvrecieve"){?>class="active"<? }?>><a HREF="<?=$link;?>?page=pvrecieve">แจ้งถอน PV</a></li><?php */?>
                        <li <? if($page=="refer"){?>class="active"<? }?>><a HREF="<?=$link;?>?page=refer">แจ้งการชำระเงิน</a></li>
                    </ul>
                </div>
            </div>
            <div id="page-subheader">
              <div class="wrapper">
                <? include_once('memberna_header.php');?>
              </div>
            </div>
        </header>
        
        <section id="content">
            <div class="wrapper">

                <!-- Main Section -->

                <section class="grid_8 first">
                	<? switch($page){
							case home:include('memberna_default.php');
								break;
							case checkline:include('memberna_checkline.php');
								break;
							case pvpay:include('memberna_pvpay.php');
								break;
							//case pvrecieve:include('memberna_pvrecieve.php');
								//break;
							case renew:include('memberna_renew.php');
								break;
							case refer:include('memberna_payrefer.php');
								break;
							case process:include('memberna_process.php');
								break;
							case logout:
								unset($_SESSION['smid']);
								unset($_SESSION['smco']);
								unset($_SESSION['smle']);
								session_destroy();
								echo "<script>window.location='../member/login.php';</script>";
								break;
						default:include('memberna_default.php');
					}?>
                    <div class="clear">&nbsp;</div>

                </section>

                <!-- Main Section End -->
                
                <div class="clear"></div>

            </div>
            <div id="push"></div>
        </section>
    </div>
    
    <footer id="page-footer">
        <div id="footer-inner">
            <p class="wrapper"><span style="float: right;"><a href="http://<?=$www;?>"><?=$mainname;?></a> | <a href="http://www.thailandwebmarketing.com">Thailandwebmarketing</a></span>หมายเลขไอพีของคุณคือ <?=$_SERVER['REMOTE_ADDR'];?> | &copy; 2011 <?=$www;?>. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
<? }else{?>
<script type="text/javascript">window.location='../member/login.php';</script>
<? }?>