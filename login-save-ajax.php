<?php 
	include("conn.php"); 
	session_start();
		// ÓÊÏä
		$yongxiang = empty($_REQUEST['yongxiang']) ? "null":strtolower($_REQUEST['yongxiang']);
	    // ÃÜÂë
	    $password = empty($_REQUEST['password']) ? "null":$_REQUEST['password'];
			    $responseArr=array(
			    	"code"=>"200",
			    	"msg"=>"登陆成功"
			    );
	    	// 首先根据用户提交的邮件查询，如果至少一条记录，则邮件正确，否则邮箱不正确。
	    	    $sql="select * from user where email = '{$yongxiang}'";
	    	    $result=mysqli_query($conn,$sql);
	    	    if (mysqli_num_rows($result)>0) {
	    	    	// 提示邮箱正确
	    	    	// // 如果邮箱正确，再判断用户提交的密码和上一步查询到密码是否相等
	    	    	// ，相等则密码正确，否则密码不正确
	    	    	$arr=mysqli_fetch_assoc($result);
	    	    		if ($password==$arr["password"]){
	    	    			// 密码也对上了
	    	    			$_SESSION["usemail"]=$arr["email"];
	    	    			$_SESSION["usname"]=$arr["name"];
	    	    			$_SESSION["usid"]=$arr["id"];
	    	    		}else{
	    	    			$responseArr["code"]=20001;
	    	    			$responseArr["msg"]="密码错误";
	    	    		}
	    	    }else{
	    	    	// 邮箱不存在
	    	    	$responseArr["code"]=20004;
	    	    	$responseArr["msg"]="用户名不存在";
	    	    	
	    	    }
	    // print_r($result);
	    // print_r($responseArr);
	    echo json_encode($responseArr);
	    // print_r($arr);
	    // $sql="select email,name,password,question,answer from user where email = '{$yongxiang}' and password='{$password}'";
		// $rcc = mysqli_query($conn,$sql); 
		// if (mysqli_num_rows($rcc) >=1) {
		// 	$_SESSION["usname"]=$yongxiang;
		// 	echo "ok";
		// 	// header("Refresh:1;url=xinwen.php");
		// }else{
		// 	echo "error".mysqli_error($conn);
		// 	// header("Refresh:1;url=logon.php");
		// }

	mysqli_close($conn);
	// include ("04_p.style.php");
 ?>
 

