<? require_once('../config/connect.php'); require_once('setting.php'); $link=$_SERVER['PHP_SELF']; $page=$_GET['page'];

$smid=$adminid;
$smco=$_SESSION['smco'];
$smle=$_SESSION['smle'];

if($smid!="" and $smle!="" and $smle==9){?>
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
<script type="text/javascript" src="js/custom.js"></script>

<script SRC="js/pricing.js"></script>

<? if($page=="request" and ($_GET['casy']=="checkliner" or $_GET['casy']=="upgradevip")){?>
<link rel="stylesheet" href="module/org_chart/css/jquery.jOrgChart.css"/>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script src="module/org_chart/jquery.jOrgChart.js"></script>
<script>
jQuery(document).ready(function() {
	$("#org").jOrgChart({
		chartElement : '#chart',
		dragAndDrop  : true
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
                        <li>เข้าสู่ระบบโดย Administrator:</li>
                        <li><a href="../../">หน้าแรกเว็บไซต์</a></li>
                        <li><a href="../member/admin_panel.php">ระบบจัดการเว็บไซต์</a></li>
                        <li><a href="<?=$link;?>?page=logout">ออกจากระบบ</a></li>
                    </ul>
                </div>
                <h1>ระบบเช็คสายงาน</h1>
                <div id="main-nav">
                    <ul class="clearfix">
                        <li <? if($page==""){?>class="active"<? }?>><a HREF="adminna.php">สถิติรวม</a></li>
                        <li <? if($page=="member"){?>class="active"<? }?>><a HREF="adminna.php?page=member">อัฟเกรดสมาชิก</a></li>
                        <li <? if($page=="liner"){?>class="active"<? }?>><a HREF="adminna.php?page=liner">เช็คสายงาน</a></li>
                        <li <? if($page=="pvmng" or $_GET['casy']=="pvmanage"){?>class="active"<? }?>><a HREF="adminna.php?page=pvmng">จัดการรายได้</a></li>
                        <li <? if($page=="renew"){?>class="active"<? }?>><a HREF="adminna.php?page=renew">รักษายอดรายเดือน</a></li>
                        <li <? if($page=="topup"){?>class="active"<? }?>><a HREF="adminna.php?page=topup">โบนัสเติมเงิน</a></li>
                        <li <? if($page=="payrefer"){?>class="active"<? }?>><a HREF="adminna.php?page=payrefer">รายการแจ้งชำระเงิน</a></li>
                        <?php /*?><li <? if($page=="payrecieve"){?>class="active"<? }?>><a HREF="adminna.php?page=payrecieve">รายการแจ้งถอน รายได้</a></li>
                        <li <? if($page=="report"){?>class="active"<? }?>><a HREF="adminna.php?page=report">รายงานเอกสาร</a></li><?php */?>
                        <!-- <li <? if($page=="allsale"){?>class="active"<? }?>><a HREF="adminna.php?page=allsale">ตัดค่าคอมมิชชั่น</a></li> -->
                        <!-- <li <? if($page=="daylenscut"){?>class="active"<? }?>><a href="adminna.php?page=daylenscut">ตัดยอดรายวัน</a></li> -->
                        <li class="action"><a href="#">ตัดยอด</a>
                            <ul>
                                <li><a href="adminna.php?page=daylenscut">ตัดยอดรายวัน</a></li>
                                <li><a href="adminna.php?page=lenscut">ตัดยอดรายเดือน</a></li>
                            </ul>
                        </li>
                        <!-- <li <? if($page=="lenscut"){?>class="active"<? }?>><a href="adminna.php?page=lenscut">ตัดยอดรายเดือน</a></li> -->
                    </ul>
                </div>
            </div>
            <div id="page-subheader">
              <div class="wrapper">
                <? include_once('adminna_header.php');?>
                <form name="qsc" id="qsc" method="post" action="<?=$link;?>?page=member">
                <input placeholder="ค้นหาสมาชิก..." type="text" name="name" id="quicksearch" style="height:16px;" />
                <input type="image" name="btnok" value="submit" src="images/icon/049.png" style="width:16px; height:16px;" />
                </form>
              </div>
            </div>
        </header>
        
        <section id="content">
            <div class="wrapper">

                <!-- Main Section -->

                <section class="grid_8 first">
                	<? switch($page){
						  case 'home':			include('adminna_default.php');		break;
						  case 'member':		include('adminna_member.php');		break;
						  case 'liner':			include('adminna_liner.php');		break;
						  case 'pvmng':			include('adminna_pvmanage.php');	break;
						  case 'renew':			include('adminna_renew.php');		break;
						  case 'uplevel':		include('aminna_uplevel.php');		break;
                          case 'topup':         include('adminna_topup.php');       break;
						  case 'payrefer':		include('adminna_payrefer.php');	break;
						  case 'allsale':		include('adminna_allsale.php');		break;
						  case 'payrecieve':	include('adminna_pvrecieve.php');	break;
						  case 'report':		include('adminna_report.php');		break;
						  case 'request':		require('adminna_request.php');		break;
						  case 'process':		require('adminna_process.php');		break;
                          case 'daylenscut':    include('adminna_pvdaylens.php');   break;
						  case 'lenscut':		include('adminna_pvlens.php');		break;
						  case 'logout':	
							  unset($_SESSION['smid']); 
							  unset($_SESSION['smco']); 
							  unset($_SESSION['smle']); 
							  session_destroy();
							  echo "<script>window.location='../member/login.php';</script>";
							  break;
						  case 'confirmpay':
							  if($_GET['gt']==0){
								  mysql_query("update system_payrefer set sf_status='1' where sf_id='$_GET[fid] limit 1'")or die(mysql_error());
							  }else{
								  mysql_query("update system_payrefer set sf_status='0' where sf_id='$_GET[fid] limit 1'")or die(mysql_error());
							  }
							  mysql_close();
							  echo "<script>window.back(-1);</script>"; 
							  break;
						  default:include('adminna_default.php');
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