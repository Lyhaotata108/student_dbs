<?php 
session_start();
		include("conn.php");
		// // 判断邮箱
		$yongxiang =empty($_REQUEST['yongxiang']) ? "null":strtolower($_REQUEST['yongxiang']);
		// 用户名
	    	$yonghu = empty($_REQUEST['yonghu']) ? "null":$_REQUEST['yonghu'];
	    	// 密码
	    	$password = empty($_REQUEST['password']) ? "null":$_REQUEST['password'];
	    	// 密码提示
	    	$miTshi = empty($_REQUEST['miTshi']) ? "null":$_REQUEST['miTshi'];
	   	 // 答案
	    	$daAan = empty($_REQUEST['daAan']) ? "null":$_REQUEST['daAan'];
			$sql="insert into user(email,name,password,question,answer) value('$yongxiang','$yonghu','$password','$miTshi','$daAan')";
			// echo $sql;				
				// var_dump($sql);
				$result = mysqli_query($conn,$sql);
				if ($result) {
					echo"ok";
				}else{
					echo "orr";
				}			
mysqli_close($conn); 
?>