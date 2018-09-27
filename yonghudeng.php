<?php 
	include("conn.php");
	session_start();
		// ÓÊÏä
		$yongxiang = empty($_POST['yongxiang']) ? "null":strtolower($_POST['yongxiang']);
	    // ÃÜÂë
	    $password = empty($_POST['password']) ? "null":$_POST['password'];

	    $sql="select email,name,password,question,answer from user where email = '{$yongxiang}' and password='{$password}'";
		$rcc = mysqli_query($conn,$sql);
		if (mysqli_num_rows($rcc) >=1) {
			$_SESSION["usname"]=$yongxiang;
			echo "<p class='pp'>{$yongxiang}登录成功</p><script>document.cookie='usname={$yongxiang}';</script>";
			header("Refresh:1;url=xinwen.php");
		}else{
			echo "<p class='pp'>{$yongxaing}登录失败</p>".mysqli_error($conn);
			header("Refresh:1;url=logon.php");
		}
	mysqli_close($conn);
	// include ("04_p.style.php");
 ?>
 <style>
	.pp{
		width: 500px;
		height: 100px;
		background-color: #f34f4fd6;
		margin: 10px auto;
		text-align: center;
		line-height: 100px;
		border-radius: 10px 10px 10px 10px;
		font-size: 35px;
		display: none;
		color: color;
	}
</style>
