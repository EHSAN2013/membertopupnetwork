<? include('../config/connect.php'); extract($_GET); extract($_POST);

$smid=$memberid;
$secu=$_SESSION['msecurity'];
$smco=$_SESSION['smco'];
$smle=$_SESSION['smle'];

//ตรวจสอบการเข้ามาใช้งาน ตามสถานะของสมาชิก
if($smid!="" and $smco!="" and $smle==1 and $secu==md5('msecurity')){ $step=$_GET['step'];?>
<!DOCTYPE html>
<html lang="th">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$title;?></title>

<!-- css -->
<link rel="stylesheet" media="screen" href="./css/reset.css" />
<link rel="stylesheet" media="screen" href="./css/grid.css" />
<link rel="stylesheet" media="screen" href="./css/style.css" />
<link rel="stylesheet" media="screen" href="./css/messages.css" />
<link rel="stylesheet" media="screen" href="./css/forms.css" />

<!--[if lt IE 8]>
<link rel="stylesheet" media="screen" href="http://themes.vivantdesigns.com/streamlined/css/ie.css" />
<![endif]-->

<!-- jquerytools -->
<script src="./js/jquery.tools.min.js"></script>
<script type="text/javascript" src="./js/global.js"></script>

<!--[if lt IE 9]>
<script type="text/javascript" src="http://themes.vivantdesigns.com/streamlined/js/html5.js"></script>
<script type="text/javascript" src="http://themes.vivantdesigns.com/streamlined/js/PIE.js"></script>
<script type="text/javascript" src="http://themes.vivantdesigns.com/streamlined/js/IE9.js"></script>
<script type="text/javascript" src="http://themes.vivantdesigns.com/streamlined/js/ie.js"></script>
<![endif]-->
<script type="text/javascript" src="./js/mcustom.js"></script>
<meta charset="UTF-8"></head>
<? 
$checkstatus=queryx1("select sli_level from system_liner where sli_sr_reply='".$smid."' limit 1");
if($checkstatus['sli_level']!=0){ $mjk=1; if($checkstatus['sli_level']==1){$yoi="Active";}else{$yoi="รอการชำระเงิน";}}
?>
<body>
    <div id="wrapper">
        <header>
            <div class="container_8 clearfix">
            	<h1 class="grid_1"><?php echo $mainname; ?></h1>
                <nav class="grid_7">
                    <ul class="clearfix">
                    	<!-- Start Step -->
                        <li class="action <? if($step==""){?>active<? }?>"><a href="index.php" class="button button-green">รับ Link ผู้แนะนำ</a></li>
                        <li class="action <? if($step=="replymember"){?>active<? }?>"><a href="index.php?step=replymember" class="button button-green">รายชื่อผู้สนใจธุรกิจ</a></li>
                        <li class="action <? if($step=="webboard"){?>active<? }?>"><a href="index.php?step=webboard" class="button button-green">เว็บบอร์ด</a></li>
                        <? if($mjk==1){?>
                        <li class="action"><a href="../liner/memberna.php" class="button button-green">เช็คสายงาน</a></li>     
                        <? }else{?>
                        <li class="action"><a href="#" rel="#confirmcheckline" class="button button-gray modalInput">เช็คสายงาน</a></li>     
                        <? }?>          
                        <li class="action <? if($step=="product"){?>active<? }?>"><a href="#" class="button button-green">ผลิตภัณฑ์</a>
                            <ul>
                                <li><a href="index.php?step=product">รายการสินค้า</a></li>
                                <li><a href="index.php?step=topup">เติมเงินเข้าระบบ</a></li>
                            </ul>
                        </li>
                        <li class="action <? if($step=="payrefer"){?>active<? }?>"><a href="index.php?step=payrefer" class="button button-green">แจ้งการชำระเงิน</a></li>
                        <!-- End Step -->
                        <!-- Contact -->
                        <li class="action">
                            <a href="#" class="has-popupballoon button button-blue">ติดต่อฝ่ายดูแลลูกค้า</a>
                            <div class="popupballoon top">
                            	<form action="#" method="post" name="formcontact" id="formcontact">
                                <input type="hidden" name="smid" value="<?=$smid;?>">
                                <h3>ติดต่อฝ่ายดูแลลูกค้า</h3>
                                <div class="regist-error"></div>
                                หัวข้อ<br />
                                <input type="text" required="required" name="subject" /><br />
                                ข้อความ<br />
                               	<textarea cols="23" rows="6" required="required" name="detail"></textarea><br />
                                <hr />
                                <input type="submit" class="button button-green" value="ส่งข้อความ" name="brnclicksend" />
                                <input type="button" class="button button-gray close" value="ยกเลิก" name="brnclickclose" />
                                </form>
                            </div>
                        </li>
                        <!-- Logout -->
                        <li class="action fr"><a href="index.php?step=logout" class="button button-red" onClick="return confirm('ต้องการออกจากระบบ ใช่ หรือ ไม่?');">ออกจากระบบ</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        
        <section>
            <? switch($step){
					case 'imformation':		include('information_page.php');	break;
					case 'product':			include('product.php');				break;
					case 'updateacc':		include('member_web.php');			break;
					case 'updatemyinfo':	include('updatemyinfo.php');		break;
					case 'payrefer':		include('pay_refer.php');			break;
					case 'replymember':		include('reply_member.php');		break;
					case 'webboard':		include('webboard.php');			break;
					case 'webboardview':	include('webboardview.php');		break;
					case 'productdetail':	include('prdeuct_detail.php');		break;
                    case 'topup':           include('topup.php');               break;
					case logout:
						unset($_SESSION['smid']);
						unset($_SESSION['smco']);
						unset($_SESSION['smle']);
						session_destroy();
						echo "<script>window.location='login.php';</script>";	break;
					default:				include('default.php');
			}?>
            <div id="push"></div>
        </section>
    </div>
    
    <footer>
        <? require_once('../config/footer.php');?>
    </footer>
</body>
</html>

<!-- user input dialog -->
<div class="widget modal" id="confirmcheckline">
   <header><h2>ขออภัยค่ะ</h2></header>
   <section>
       <p>คุณยังไม่ได้เป็นสมาชิกในระบบสายงานใด ๆ ค่ะ หากต้องการเข้าสู่ระบบสายงาน โปรดแจ้งการชำระเงินสมัครสมาชิกวีไอพีเพื่อเป็นเข้าสู่ระบบสายงาน และรับสิทธิประโยชน์มากมาย</p>
       <p><b>ขอบคุณค่ะ</b></p>
       
       <hr/>
	   <button class="button button-gray close" type="button">ปิด</button>
   </section>
</div>
      
<? mysql_close(); }else{echo "<script>window.location='login.php';</script>";}session_write_close();?>