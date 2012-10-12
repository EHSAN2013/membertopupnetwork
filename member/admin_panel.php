
<? include('../config/connect.php'); 
require_once 'module/liner_topup_point.php';

$smid=$adminid; 
$smco=$_SESSION['smco']; 
$smle=$_SESSION['smle']; 
$adminsc=$_SESSION['asecurity'];

if($smid!="" and $smco!=="" and $smle==9 and $adminsc==md5('asecurity')){$page=$_GET['page'];?>
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
<link rel="stylesheet" media="screen" href="./css/tables.css" />

<!--[if lt IE 8]>
<link rel="stylesheet" media="screen" href="http://themes.vivantdesigns.com/streamlined/css/ie.css" />
<![endif]-->

<!-- jquerytools -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="http://cdn.jquerytools.org/1.2.6/full/jquery.tools.min.js"></script>
<script type="text/javascript" src="./js/global.js"></script>
<script type="text/javascript" src="./js/jquery.tables.js"></script>

<!--[if lt IE 9]>
<script type="text/javascript" src="http://themes.vivantdesigns.com/streamlined/js/html5.js"></script>
<script type="text/javascript" src="http://themes.vivantdesigns.com/streamlined/js/PIE.js"></script>
<script type="text/javascript" src="http://themes.vivantdesigns.com/streamlined/js/IE9.js"></script>
<script type="text/javascript" src="http://themes.vivantdesigns.com/streamlined/js/ie.js"></script>
<![endif]-->

<script type="text/javascript" src="./js/custom.js"></script>
<meta charset="UTF-8">
</head>
<body>
    <div id="wrapper">
        <header>
            <div class="container_8 clearfix">
                <h1 class="grid_1"><a href="admin_panel.php">Admin Panel</a></h1>
                <nav class="grid_7">
                    <ul class="clearfix">
                        <li class="action">
                            <a href="#" class="has-popupballoon button button-orange">ข้อมูลส่วนตัว</a>
                            <div class="popupballoon top">
                            <div class="regist-error"></div>
                            <? $myself=queryx1("select sm_name,sm_email,sm_htel,sm_mtel,sm_addr,sm_district from system_member where sm_id='$smid' limit 1");?>
                            <form action="#" method="post" name="formeditmydata" id="formeditmydata">
                            <input type="hidden" name="sm_id" value="<?=$smid;?>">
                                <h3>แก้ไขข้อมูลส่วนตัว</h3>
                                ชื่อ<br />
                                <input type="text" name="sm_name" required="required" value="<?=$myself['sm_name'];?>" /><br />
                                อีเมล<br />
                                <input type="text" name="sm_email" required="required" value="<?=$myself['sm_email'];?>" /><br />
                                เบอร์โทรศัพท์<br />
                                <input type="text" name="sm_htel" required="required" value="<?=$myself['sm_htel'];?>" /><br />
                                เบอร์โทรศัพท์มือถือ<br />
                                <input type="text" name="sm_mtel" required="required" value="<?=$myself['sm_mtel'];?>" />
                                ที่อยู่<br />
                                <textarea rows="3" cols="23" name="sm_addr"><?=$myself['sm_addr'];?></textarea>
                                จังหวัด<br />
                                <select name="sm_district">
                                	<? $sqeryd=queryx2("select * from system_district");
									while(list($sdid,$sdname)=mysql_fetch_row($sqeryd)){
									?>
                                    <option value="<?=$sdid;?>" <? if($sdid==$myself['sm_district']){?>selected<? }?>><?=$sdname;?></option>
                                    <? }?>
                                </select>
                                <hr />
                                <input type="submit" value="แก้ไขข้อมูล" class="button button-green"/>
                                <input type="button" class="button button-gray close" value="ปิด"/>
                            </form>
                            </div>
                        </li>
                        <li class="action">
                            <a href="#" class="has-popupballoon button button-orange">เปลี่ยนรหัสผ่าน</a>
                            <div class="popupballoon top">
                            <div class="regist-error"></div>
                            <form name="changepassword" id="changepassword" method="post" action="#">
                            <input type="hidden" name="sm_id" value="<?=$smid;?>">
                                <h3>เปลี่ยนรหัสผ่าน</h3>
                                รหัสผ่านใหม่<br />
                                <input type="password" name="passwordnew" required="required" /><br />
                                รหัสผ่านใหม่อีกครั้ง<br />
                                <input type="password" name="passwordconf" required="required" /><br />
                                <hr />
                                <input type="submit" value="บันทึก" class="button button-green"/>
                                <input type="button" class="button button-gray close" value="ปิด"/>
                            </form>
                            </div>
                        </li>
                       <li class="action fr"><a href="admin_panel.php?page=logout" class="button button-red" onClick="return confirm('ต้องการออกจากระบบ ใช่ หรือ ไม่?');">ออกจากระบบ</a></li>
                       <li class="action fr"><a href="../liner/adminna.php" class="button button-green">เข้าระบบจัดการสายงาน</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        
        <section>
            <div class="container_8 clearfix">

                <!-- Sidebar -->

                <aside class="grid_1">

                    <nav class="global">
                        <ul class="clearfix">
                            <li <? if($page=="" or $page=="fullview"){?>class="active"<? }?>><a class="nav-icon icon-book" href="admin_panel.php">รายชื่อสมาชิก</a></li>
                            <li <? if($page=="product" or $page=="product_add" or $page=="product_list"){?>class="active"<? }?>><a class="nav-icon icon-tick" href="admin_panel.php?page=product">รายการสินค้า</a></li>
                            <li <? if($page=="slider"){?>class="active"<? }?>><a class="nav-icon icon-product" href="admin_panel.php?page=slider">ภาพสไลด์</a></li>
                        	<li <? if($page=="webboard" or $page=="webboardview"){?>class="active"<? }?>><a href="admin_panel.php?page=webboard" class="nav-icon icon-house">เว็บบอร์ด</a></li>
                            <li <? if($page=="news" or $page=="news_view"){?>class="active"<? }?>><a href="admin_panel.php?page=news" class="nav-icon icon-news">ข่าวประชาสัมพันธ์</a></li>
                            <li <? if($page=="payview"){?>class="active"<? }?>><a class="nav-icon icon-note" href="admin_panel.php?page=payview">แจ้งชำระเงิน</a></li>
                            <li <? if($page=="topupview"){?>class="active"<? }?>><a class="nav-icon icon-phone" href="admin_panel.php?page=topupview">แจ้งเติมเงินเข้าระบบ</a></li>
                            <li <? if($page=="linerlist"){?>class="active"<? }?>><a class="nav-icon icon-org" href="admin_panel.php?page=linerlist">แจ้งการต่อสายงาน</a></li>
                        </ul>
                    </nav>
                    <nav class="global" style="margin:-20px -20px 0 0;">
                    	<h3 style="font-size:11px; text-shadow:0 0 1px #333; padding:5px 0 5px 15px; border-bottom:1px dotted #000; border-top:1px dotted #000;">จัดการข้อมูลธุรกิจ</h3>
                        <ul class="clearfix">
                            <li <? if($page=="oppatunity"){?>class="active"<? }?>><a class="nav-icon icon-time" href="admin_panel.php?page=oppatunity">โอกาศทางธุรกิจ</a></li>
                            <li <? if($page=="onlinelearning"){?>class="active"<? }?>><a class="nav-icon icon-time" href="admin_panel.php?page=onlinelearning">ห้องเรียออนไลน์</a></li>
                        	<li <? if($page=="faq"){?>class="active"<? }?>><a class="nav-icon icon-time" href="admin_panel.php?page=faq">คำถามที่พบบ่อย</a></li>
                            <li <? if($page=="meetingcalendar"){?>class="active"<? }?>><a class="nav-icon icon-time" href="admin_panel.php?page=meetingcalendar">ตารางการประชุม</a></li>
                            <li <? if($page=="testimonials"){?>class="active"<? }?>><a class="nav-icon icon-time" href="admin_panel.php?page=testimonials">Testimonials</a></li>
                            <li <? if($page=="promotion"){?>class="active"<? }?>><a class="nav-icon icon-time" href="admin_panel.php?page=promotion">โปรโมชั่นพิเศษ</a></li>
                            <li <? if($page=="vdo"){?>class="active"<? }?>><a class="nav-icon icon-time" href="admin_panel.php?page=vdo">วีดีโอ</a></li>
                            <li <? if($page=="contactus"){?>class="active"<? }?>><a class="nav-icon icon-time" href="admin_panel.php?page=contactus">ติดต่อบริษัท</a></li>
                        </ul>
                    </nav>
                </aside>

                <!-- Sidebar End -->
                

                <!-- Main Section -->
				
                <? switch($page){
					/*PAGES ALL*/
					case 'member':			include('default.php');				break;
					case 'slider':			include('product_slider.php');		break;
					case 'payview':			include('admin_payview.php');		break;
                    case 'topupview':       include('admin_topupview.php');     break;
                    case 'linerlist':       include('admin_linerlist.php');     break;
					case 'product':			include('admin_product.php');		break;
					case 'product_add':		include('admin_product_add.php');	break;
					case 'product_list':	include('admin_product_list.php');	break;
					case 'postdata':		include('admin_postdata.php');		break;
					case 'webboard':		include('admin_webboard.php');		break;
					case 'fullview':		include('admin_full_view.php');		break;
					case 'news':			include('admin_news.php');			break;
					case 'news_view':		include('admin_news_view.php');		break;
					case 'webboardview':	include('admin_webboardview.php');	break;
					/*PAGES REQUEST*/
					case 'oppatunity':		include('admin_webpage.php');		break;
					case 'onlinelearning':	include('admin_webpage.php');		break;
					case 'meetingcalendar':	include('admin_webpage.php');		break;
					case 'testimonials':	include('admin_webpage.php');		break;
					case 'vdo':				include('admin_webpage.php');		break;
					case 'faq':				include('admin_webpage.php');		break;
					case 'promotion':		include('admin_webpage.php');		break;
					case 'contactus':		include('admin_webpage.php');		break;
					case 'aboutus':			include('admin_webpage.php');		break;
					/*DATA DELETE*/
					case 'deletes':
						$dlt=$_GET['dlt']; $tld=$_GET['tld'];
						if($tld==1){
							mysql_query("delete from system_webboard where sw_id='$dlt' limit 1")or die(mysql_error());
						}else{
							mysql_query("delete from system_webboard where sw_target='$dlt' limit 1")or die(mysql_error());
							mysql_query("delete from system_webboard where sw_id='$dlt' limit 1")or die(mysql_error());
						}
						mysql_close();
						echo "<script>window.back(-1);</script>"; 
						break;
					case 'delete':
						$id=$_GET['id'];
						$g=$_GET['g'];
						$scid=$_GET['scid'];
						if($g==1){
							$img=readname("spd_pic","system_product","spd_id",$id);
							@unlink("../file/product/".$img);
							@unlink("../file/product/thumb_".$img);
							mysql_query("delete from system_product where spd_id='$id'")or die(mysql_error());
							mysql_close();
							echo "<script>window.location='admin_panel.php?page=product_list&scid=$scid';</script>";
						}else{
							$finde=queryx2("select spd_pic from system_product where spd_sc_id='$scid'");
							while($img=mysql_fetch_array($finde)){
								@unlink("../file/product/".$img);
								@unlink("../file/product/thumb_".$img);
							}
							mysql_query("delete from system_product where spd_sc_id='$id'")or die(mysql_error());
							mysql_query("delete from system_category where sc_id='$id'")or die(mysql_error());
							mysql_close();
							echo "<script>window.location='admin_panel.php?page=product';</script>";
						}
						break;
					/*LOGOUT*/
					case 'logout':
						unset($_SESSION['smid']);
						unset($_SESSION['smco']);
						unset($_SESSION['smle']);
						session_destroy();
						echo "<script>window.location='login.php';</script>";
						break;
					/*DATA UPDATE*/
					case 'confirmpay':
						if($_GET['gt']==0){
							mysql_query("update system_payrefer set sf_status='1' where sf_id='$_GET[fid] limit 1'")or die(mysql_error());
						}else{
							mysql_query("update system_payrefer set sf_status='0' where sf_id='$_GET[fid] limit 1'")or die(mysql_error());
						}
						mysql_close();
						echo "<script>window.location='admin_panel.php?page=payview';</script>"; 
						break;
                    case 'confirmtopup':
                        if($_GET['gt']==0){
                            mysql_query("update system_topup set stu_status='1' where stu_id='$_GET[fid] limit 1'")or die(mysql_error());
                            addTopupPoint($_GET['fid'], $_GET['mid'], $_GET['amnt']);
                        }else{
                            mysql_query("update system_topup set stu_status='0' where stu_id='$_GET[fid] limit 1'")or die(mysql_error());
                            clearTopupPoint($_GET['fid']);
                        }
                        // mysql_close();
                        echo "<script>window.location='admin_panel.php?page=topupview';</script>"; 
                        break;
					case 'confirmmem':
						if($_GET['gt']==0 or $_GET['gt']==3){
							mysql_query("update system_member set sm_level='1' where sm_id='$_GET[fid] limit 1'")or die(mysql_error());
						}else{
							mysql_query("update system_member set sm_level='3' where sm_id='$_GET[fid] limit 1'")or die(mysql_error());
						}
						mysql_close();
						echo "<script>window.back(-1);</script>"; 
						break;
					/*PAGE DEFAULT*/
					default:include('admin_member.php');
				}?>
                
                <!-- Main Section End -->

            </div>
            <div id="push"></div>
        </section>
    </div>
    
    <footer>
        <? require_once('../config/footer.php');?>
    </footer>
</body>
</html>
<? 
mysql_close(); 
}else{echo "<script>window.location='login.php';</script>";}
//session_write_close();?>