<?php
session_start();

	$product_del = $_POST['product_del'];
	$calculate = $_POST['calculate'];
	$complete = $_POST['complete'];

	//เช็คว่ามีการเลือกลบ check box เพื่อลบสินค้าหรือไม่
	if(count($product_del) == 0){
		$product_del = array();
	}
	$a=0;
		for($i=0;$i<count($_SESSION['spd_id']);$i++){
			if(!in_array($_SESSION['spd_id'][$a], $product_del)){
				$temp_id[] = $_SESSION['spd_id'][$a];
				$temp_code[] = $_SESSION['spd_code'][$a];
				$temp_name[] = $_SESSION['spd_name'][$a];
				$temp_price[] = $_SESSION['spd_price'][$a];
				$temp_spimage[] = $_SESSION['spd_pic'][$a];
				$temp_num[] = $_SESSION['spd_num'][$a];
			}
	$a++;
	}
	//ถ้าเท่ากับ $calculate ทำตามเงื่อนไขนี้
	if($calculate){	
		header("location: index.php?page=productorder");
		$_SESSION['spd_id'] = $temp_id;
		$_SESSION['spd_code'] = $temp_code;
		$_SESSION['spd_name'] = $temp_name;
		$_SESSION['spd_price'] = $temp_price;
		$_SESSION['spd_pic'] = $temp_spimage;
		$_SESSION['spd_num'] = $temp_num;
	}else if(isset($_POST['complete'])){$a =0;
		for($i=0;$i<count($_SESSION['spd_id']);$i++){$a++;
			$temp_num[$i] = $_POST['qty_item_'.$a.''];
		}
		$_SESSION['spd_id'] = $temp_id;
		$_SESSION['spd_code'] = $temp_code;
		$_SESSION['spd_name'] = $temp_name;
		$_SESSION['spd_price'] = $temp_price;
		$_SESSION['spd_pic'] = $temp_spimage;
		$_SESSION['spd_num'] = $temp_num;
		header("location: index.php?page=payment");
	}
?>