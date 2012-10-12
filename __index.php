<? session_start(); $page=$_GET['page']; 
include("config/connect.php"); include("config/class.upload.php"); include("config/function.php"); include("link_reply.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$www;?></title>
<meta name="keywords" content="<?=$kw;?>">
<meta name="description" content="<?=$description;?>">
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="css/YUI-cssreset-min.css" media="all">
<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
<link rel="stylesheet" type="text/css" href="css/product.css" media="all">
<link rel="stylesheet" type="text/css" href="css/global.css" media="all">
<link rel="stylesheet" type="text/css" href="css/style-newsticker.css">
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen">
<link rel="stylesheet" type="text/css" href="page_error.css" media="all">
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
<script language="javascript">
	Cufon.replace('h1,h2,h3,h4,h5,h6', { fontFamily: 'supermarket'});
	Cufon.replace('#navigator .navi_list li a, .title_admintalk', { fontFamily: 'supermarket', hover: true});
	
	$(document).ready(function() {
		<!-- Slider -->
		$('#slides').slides({
			preload: true,
			preloadImage: 'img/loading.gif',
			play: 5000,
			pause: 2500,
			hoverPause: true,
			animationStart: function(current){
				$('.caption').animate({
					bottom:-35
				},100);
				if (window.console && console.log) {
					// example return of current slide number
					console.log('animationStart on slide: ', current);
				};
			},
			animationComplete: function(current){
				$('.caption').animate({
					bottom:0
				},200);
				if (window.console && console.log) {
					// example return of current slide number
					console.log('animationComplete on slide: ', current);
				};
			},
			slidesLoaded: function() {
				$('.caption').animate({
					bottom:0
				},200);
			}
		});
		
		<!-- Member Slide -->
		$("#newsticker-demo").jCarouselLite({
			vertical: true,
			hoverPause:true,
			btnPrev: ".previous",
			btnNext: ".next",
			visible: 5,
			auto:3000,
			speed:900
		});
		
		<!-- Form regis-->
		$("#formregister").validate({
	   rules: {
		 username: {
		   required: true,
		   minlength: 6
		 },
		 password: {
		   required: true,
		   minlength: 6
		 },
		 cpassword: {
		   required: true,
		 },
		 sm_email: {
		   required: true,
		   email: true
		 },
		 sm_anme: {
			required: true	
		 },
		 sm_pid: {
			 required: true,
			 minlength: 13,
			 number: true
		 },
		 sm_mtel: {
			 required: true,
			 minlength: 10,
			 number: true
		 },
		 sm_bank_name: {
		 	 required: true
		 },
		 sm_bank_area: {
		 	 required: true
		 },
		 sm_bank_acc: {
		 	 required: true
		 },
		 sm_bank_id: {
		 	 required: true
		 },
		 sm_bank_type: {
		 	 required: true
		 },
		 btncheck: {
			 required: true
		 }
	   },
	   messages: {
		 username: {
		   required: "โปรดกรอกชื่อผู้ใช้งานของคุณ",
		   range: "อีเมล์ไม่ถูกต้อง กรุณากรอกใหม่"
		 },
		 password: {
		   required: "โปรดกรอกรหัสผ่านของคุณ",
		   range: "อีเมล์ไม่ถูกต้อง กรุณากรอกใหม่"
		 },
		 cpassword: {
		   required: "โปรดยืนยันรหัสผ่านของคุณอีกทครั้ง",
		 },
		 sm_email: {
		   required: "โปรดกรอกอีเมล์ของคุณ",
		   email: "อีเมล์ไม่ถูกต้อง กรุณากรอกใหม่"
		 },
		 sm_anme: {
			required: "โปรดกรอกชื่อของคุณ"	
		 },
		 sm_pid: {
			 required: "โปรดระบุหมายเลขบัตรประจำตัวประชาชน",
			 range: "หมายเลขบัตรประจำตัวประชาชนไม่ถูกต้อง",
			 number: "โปรดกรอกเฉพาะตัวเลขเท่านั้น"
		 },
		 sm_mtel: {
			 required: "โปรดกรอกหมายเลขโทรศัพท์มือถือ",
			 range: "หมายเลขโทรศัพท์มือถือไม่ถูกต้อง",
			 number: "โปรดกรอกเฉพาะตัวเลขเท่านั้น"
		 },
		 sm_bank_name: {
		 	 required: "โปรดระบชื่อธนาคารของคุณ"	
		 },
		 sm_bank_area: {
		 	 required: "โปรดระบุสาขาของธนาคาร"	
		 },
		 sm_bank_acc: {
		 	 required: "โปรดระบชื่อบัญชีที่ของคุณ"	
		 },
		 sm_bank_id: {
		 	 required: "โปรดระบุหมายเลขบัญชีธนาคารของคุณ"	
		 },
		 sm_bank_type: {
		 	required: "โปรดระบุประเภทบัญชีเงินฝากของคุณ"	
		 },
		 btncheck: {
			 required: "โปรดยอมรับเงือนไขและข้อตกลง"	
		 }
	   },
		// specifying a submitHandler prevents the default submit, good for the demo
		submitHandler: function() {
			$.post('check_register.php',{
			username: $('[name=username]').val(),
			password: $('[name=password]').val(),
			cpassword: $('[name=cpassword]').val(),
			sm_email: $('[name=sm_email]').val(),
			sm_anme: $('[name=sm_anme]').val(),
			sm_sex: $('[name=sm_sex]').val(),
			sm_pid: $('[name=sm_pid]').val(),
			sm_addr: $('[name=sm_addr]').val(),
			sm_district: $('[name=sm_district]').val(),
			sm_postcode: $('[name=sm_postcode]').val(),
			sm_mtel: $('[name=sm_mtel]').val(),
			sm_htel: $('[name=sm_htel]').val(),
			sm_bank_name: $('[name=sm_bank_name]').val(),
			sm_bank_area: $('[name=sm_bank_area]').val(),
			sm_bank_acc: $('[name=sm_bank_acc]').val(),
			sm_bank_id: $('[name=sm_bank_id]').val(),
			sm_bank_type: $('[name=sm_bank_type]').val(),
			sr_target: $('[name=sr_target]').val()},
			function(data){
			   if(data.success)
			   {
				  $('.regist-error').html(data.message);
			   }else{
				  $('.regist-error').html(data.message);
			   }
			},'json');
		 return false;
		}
	  });
	  
	  <!-- Form contactus-->
		$("#contactusform").validate({
	   rules: {
		 sm_email: {
		   required: true,
		   email: true
		 },
		 sm_name: {
			required: true	
		 },
		 sm_mtel: {
			 required: true,
			 minlength: 10,
			 number: true
		 },
		 sm_addr: {
		 	 required: true
		 },
		 spambot: {
		 	 required: true
		 }
	   },
	   messages: {
		 sm_email: {
		   required: "โปรดกรอกอีเมล์ของคุณ",
		   email: "อีเมล์ไม่ถูกต้อง กรุณากรอกใหม่"
		 },
		 sm_name: {
			required: "โปรดกรอกชื่อของคุณ"	
		 },
		 sm_mtel: {
			 required: "โปรดกรอกหมายเลขโทรศัพท์มือถือ",
			 range: "หมายเลขโทรศัพท์มือถือไม่ถูกต้อง",
			 number: "โปรดกรอกเฉพาะตัวเลขเท่านั้น"
		 },
		 sm_addr: {
		 	 required: "โปรดระบุรายละเอียดที่ต้องการสอบถาม"	
		 },
		 spambot: {
		 	 required: "โปรดกรอกรหัสป้องกันสแปมส์"	
		 }
	   },
		// specifying a submitHandler prevents the default submit, good for the demo
		submitHandler: function() {
			$.post('sendmail.php',{
			sm_email: $('[name=sm_email]').val(),
			sm_name: $('[name=sm_name]').val(),
			sm_mtel: $('[name=sm_mtel]').val(),
			sm_addr: $('[name=sm_addr]').val(),
			spambot: $('[name=spambot]').val(),
			confr_spam: $('[name=confr_spam]').val()},
			function(data){
			   if(data.success)
			   {
				  $('.regist-error').html(data.message);
			   }else{
				  $('.regist-error').html(data.message);
			   }
			},'json');
		 return false;
		}
	  });
	  
	  <!-- Form shopping cart-->
		$("#formpayment").validate({
	   rules: {
		 cname: {
			required: true	
		 },
		 cmail: {
		   required: true,
		   email: true
		 },
		 ctel: {
			 required: true,
			 minlength: 10,
			 number: true
		 },
		 caddress: {
		 	 required: true
		 },
		 spambot: {
		 	 required: true
		 }
	   },
	   messages: {
		 cname: {
			required: "โปรดกรอกชื่อของคุณ"	
		 },
		 cmail: {
		   required: "โปรดกรอกอีเมล์ของคุณ",
		   email: "อีเมล์ไม่ถูกต้อง กรุณากรอกใหม่"
		 },
		 ctel: {
			 required: "โปรดกรอกหมายเลขโทรศัพท์มือถือ",
			 range: "หมายเลขโทรศัพท์มือถือไม่ถูกต้อง",
			 number: "โปรดกรอกเฉพาะตัวเลขเท่านั้น"
		 },
		 caddress: {
		 	 required: "โปรดระบุรายละเอียดที่ต้องการสอบถาม"	
		 },
		 spambot: {
		 	 required: "โปรดกรอกรหัสป้องกันสแปมส์"	
		 }
	   },
		// specifying a submitHandler prevents the default submit, good for the demo
		submitHandler: function() {
			$.post('payments_complete.php',{
			cname: $('[name=cname]').val(),
			cmail: $('[name=cmail]').val(),
			ctel: $('[name=ctel]').val(),
			caddress: $('[name=caddress]').val(),
			spambot: $('[name=spambot]').val(),
			code_hidden: $('[name=code_hidden]').val()},
			function(data){
			   if(data.success)
			   {
				  $('.regist-error').html(data.message);
			   }else{
				  $('.regist-error').html(data.message);
			   }
			},'json');
		 return false;
		}
	  });
	  
	  (function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
		fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));
	  
	  //Lightbox
	  $(window).load(function(){
		  $("#lightbox, #lightbox-panel").fadeIn(300);
	  });
	   
	  $("a#close-panel").click(function(){
		  $("#lightbox, #lightbox-panel").fadeOut(300);
	  });

	  $("a#example6").fancybox({
				'titlePosition'		: 'outside',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
	  });
	  
	  // update the plug-in version
	  $("#idPluginVersion").text($.Calculation.version);

	  /*			
	  $.Calculation.setDefaults({
		  onParseError: function(){
			  this.css("backgroundColor", "#cc0000")
		  }
		  , onParseClear: function (){
			  this.css("backgroundColor", "");
		  }
	  });
	  */
	  
	  // bind the recalc function to the quantity fields
	  $("input[name^=qty_item_]").bind("keyup", recalc);
	  // run the calculation function now
	  recalc();

	  // automatically update the "#totalSum" field every time
	  // the values are changes via the keyup event
	  $("input[name^=sum]").sum("keyup", "#totalSum");
	  
	  // automatically update the "#totalAvg" field every time
	  // the values are changes via the keyup event
	  $("input[name^=avg]").avg({
		  bind:"keyup"
		  , selector: "#totalAvg"
		  // if an invalid character is found, change the background color
		  , onParseError: function(){
			  this.css("backgroundColor", "#cc0000")
		  }
		  // if the error has been cleared, reset the bgcolor
		  , onParseClear: function (){
			  this.css("backgroundColor", "");
		  }
	  });

	  // automatically update the "#minNumber" field every time
	  // the values are changes via the keyup event
	  $("input[name^=min]").min("keyup", "#numberMin");

	  // automatically update the "#minNumber" field every time
	  // the values are changes via the keyup event
	  $("input[name^=max]").max("keyup", {
		  selector: "#numberMax"
		  , oncalc: function (value, options){
			  // you can use this to format the value
			  $(options.selector).val(value);
		  }
	  });

	  // this calculates the sum for some text nodes
	  $("#idTotalTextSum").click(
		  function (){
			  // get the sum of the elements
			  var sum = $(".textSum").sum();

			  // update the total
			  $("#totalTextSum").text("฿" + sum.toString());
		  }
	  );

	  // this calculates the average for some text nodes
	  $("#idTotalTextAvg").click(
		  function (){
			  // get the average of the elements
			  var avg = $(".textAvg").avg();

			  // update the total
			  $("#totalTextAvg").text(avg.toString());
		  }
	  );
			
	  function recalc(){
		  $("[id^=total_item]").calc(
			  // the equation to use for the calculation
			  "qty * price",
			  // define the variables used in the equation, these can be a jQuery object
			  {
				  qty: $("input[name^=qty_item_]"),
				  price: $("[id^=price_item_]")
			  },
			  
			  // define the formatting callback, the results of the calculation are passed to this function
			  function (s){
				  // return the number as a dollar amount
				  return "฿" + s.toFixed(2);
			  },
			  // define the finish callback, this runs after the calculation has been complete
			  function ($this){
				  // sum the total of the $("[id^=total_item]") selector
				  var sum = $this.sum();
				  
				  $("#grandTotal").text(
					  // round the results to 2 digits
					  "฿" + sum.toFixed(2)
				  );
			  }
		  );
	  }
	});
</script>
</head>

<body Onload="JavaScript:doCallAjax('');">
<div id="gearbox">
    <div id="gearcenter">
        <img src="error-404.jpg" />
    </div>
</div>

<div id="wrapper">
  <div id="header">
    <div id="logo"></div>
    <div id="callcenter"></div>
  </div>
  <div id="navigator">
    <ul class="navi_list">
      <li><a href="index.php" class="first <?=$page==""?"action_01":"";?>">หน้าแรก</a></li>
      <li><a href="index.php?page=oppatunity" class="line <?=$page=="oppatunity"?"action_01":"";?>">โอกาสทางธุรกิจ</a></li>
      <li><a href="index.php?page=products" class="line <?=$page=="products"?"action_01":"";?>">ผลิตภัณฑ์</a></li>
      <li><a href="index.php?page=markettingplan" class="line <?=$page=="markettingplan"?"action_01":"";?>">แผนการตลาด</a></li>
      <li><a href="index.php?page=onlinemeeting" class="line <?=$page=="onlinemeeting"?"action_01":"";?>">ห้องประชุมออนไลน์</a></li>
      <li><a href="index.php?page=hallofflame" class="line <?=$page=="hallofflame"?"action_01":"";?>">ทำเนียบเกียรติยศ</a></li>
      <li><a href="index.php?page=howtoregis" class="line <?=$page=="howtoregis"?"action_01":"";?>">ขั้นตอนการสมัคร-แจ้งโอนเงิน</a></li>
      <li><a href="index.php?page=faq" class="line <?=$page=="faq"?"action_01":"";?>">ถาม-ตอบ</a></li>
      <li><a href="index.php?page=contactus" class="line <?=$page=="contactus"?"action_01":"";?>">ติดต่อบริษัท</a></li>
    </ul>
  </div>
  <div id="slider">
  <? include("slider.php"); ?>
  </div>
  <div id="main">
  <?
  switch($page){
	  case 'registation':		include("regis_form.php");			break;
	  case 'products':			include("products.php");			break;
	  case 'products_list':		include("products_list.php");		break;
	  case 'products_detail':	include("products_detail.php");		break;
	  case 'productorder':		include("products_order.php");		break;
	  case 'addtocart':			include("products_addtocart.php");	break;
	  case 'payment':			include("products_payment.php");	break;
	  case 'oppatunity':		include("webpage.php");				break;
	  case 'markettingplan':	include("webpage.php");				break;
	  case 'onlinemeeting':		include("webpage.php");				break;
	  case 'meetingcalendar':	include("webpage.php");				break;
	  case 'hallofflame':		include("webpage.php");				break;
	  case 'howtoregis':		include("webpage.php");				break;
	  case 'faq':				include("webpage.php");				break;
	  case 'promotion':			include("webpage.php");				break;
	  case 'contactus':			include("webpage.php");				break;
	  case 'news_list':			include("news_list.php");			break;
	  case 'news_detail':		include("news_detail.php");			break;
	  case 'login':				echo "<script>window.location='member/index.php';</script>";		break;
	  default:					include("default.php");
  }
  ?>
  </div>
  <div class="clear"></div>
  <div align="right" style="margin-top:10px;">
<!-- Histats.com  START  (standard)-->
<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
<a href="http://www.histats.com" target="_blank" title="best counter" ><script  type="text/javascript" >
try {Histats.start(1,1947684,4,408,270,55,"00011111");
Histats.track_hits();} catch(err){};
</script></a>
<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?1947684&101" alt="best counter" border="0"></a></noscript>
<!-- Histats.com  END  -->
</div>
  <div id="footer">Copyright © 2012 All Right Reserved www.Tanakitshop.com</div>
</div>
</body>
</html>