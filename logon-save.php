<?php 
	include("conn.php");
	// // 判断邮箱
	$yongxiang =empty($_REQUEST['yongxiang']) ? "null":strtolower($_REQUEST['yongxiang']);
	$sql1="select * from user where email = '{$yongxiang}'";
	$att = mysqli_query($conn,$sql1);
	if (mysqli_num_rows($att) >=1) {
		$_SEESION["usname"]=$yongxiang;
		echo "ok";	
		}else{
		echo "orr";	
	}
mysqli_close($conn); 
?>