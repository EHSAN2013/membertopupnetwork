<? session_start(); include('../config/connect.php');?>
<!DOCTYPE html>
<html lang="th">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$title;?></title>

<link rel="stylesheet" media="screen" href="./css/reset.css" />
<link rel="stylesheet" media="screen" href="./css/grid.css" />
<link rel="stylesheet" media="screen" href="./css/style.css" />
<link rel="stylesheet" media="screen" href="./css/messages.css" />
<link rel="stylesheet" media="screen" href="./css/forms.css" />

<!--[if lt IE 9]>
<script src="http://themes.vivantdesigns.com/streamlined/js/html5.js"></script>
<script src="http://themes.vivantdesigns.com/streamlined/js/PIE.js"></script>
<![endif]-->

<!-- jquerytools -->
<script src="./js/jquery.tools.min.js"></script>
<script src="./js/jquery.ui.min.js"></script>

<!--[if lte IE 9]>
<link rel="stylesheet" media="screen" href="http://themes.vivantdesigns.com/streamlined/css/ie.css" />
<![endif]-->

<script src="./js/global.js"></script>
<script src="./js/customize.js"></script>

<meta charset="UTF-8"></head>
<body class="login">
    <div class="login-box main-content">
      <header><h2 align="center">เข้าสู่ระบบสมาชิก <?php echo $mainname; ?></h2></header>
    	<section>
    		<div id="regist-error"><div class="message info"><b>หมายเหตุ :</b> ให้ท่านกรอกอีเมล์ของท่าน และรหัสผ่านจากอีเมล์ หากท่านไม่ได้รับรหัสสามารถขอรหัสผ่านใหม่ได้ที่ "ลืมรหัสผ่าน" </div></div>
           
    		<form id="form" name="form" action="#" method="post" class="clearfix">
			<p>
				<input type="text" id="username"  class="full" value="" name="username" required="required" placeholder="Username" />
			</p>
			<p>
				<input type="password" id="password" class="full" value="" name="password" required="required" placeholder="Password" />
			</p>
			<p class="clearfix">
				<span class="fl">
					<input type="checkbox" id="remember" class="" value="1" name="remember"/>
					<label class="choice" for="remember">Remember me</label>
				</span>
                <input class="button button-orange fr" type="submit" value="Login">
			</p>
		</form>
		<ul><li><strong>ยังไม่ได้เป็นสมาชิก โปรด</strong> <a href="../../register.php" target="_blank">สมัครสมาชิก</a> หรือ <a href="#" class="modalInput" rel="#prompt">ลืมรหัสผ่าน</a></li></ul>
    	</section>
    </div>
    
<!-- user input dialog -->
<div class="widget modal" id="prompt">
   <header><h2>ลืมรหัสผ่าน</h2></header>
   <section>
       <div id="cferror">
       <p>หากคุณลืมรหัสผ่าน กรุณากรอกอีเมลที่ใช้สมัครของคุณ ระบบ จะส่งรหัสผ่านของคุณไปไห้ทางอีเมลนี้ ขอบคุณค่ะ
       </p>
       </div>
       <!-- input form. you can press enter too -->
       <form action="#" method="post" name="formforgotpass" id="formforgotpass">
           <input type="text" name="email" required="required" placeholder="Your email address" size="39" />
           <hr />
           <input type="submit" name="btnsend" value="ส่งรหัสผ่าน" class="button button-orange">
           <input type="button" name="btnclose" value="ปิด" class="button button-gray close">
       </form>
   </section>
</div>
</body>
</html>
<? mysql_close(); session_write_close();?>