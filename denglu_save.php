<style type="text/css" media="screen">
	.user_Tot{
		width:300px;
		line-height:120px;
		margin:0 auto;
		height:120px;
		text-align:center;
		border-radius:10px;
		background-color:blue;

	}
</style>
<?php 
	include("03_conn.php");
		// 邮箱
		$yongxiang = empty($_POST['yongxiang']) ? "null":strtolower($_POST['yongxiang']);
	    // 密码
	    $password = empty($_POST['password']) ? "null":$_POST['password'];

	    $scc="select email,name,password,question,answer from user where email = '{$yongxiang}' and password='{$password}'";
		$rcc = mysqli_query($conn,$scc);
		if (mysqli_num_rows($rcc) >=1) {
			echo "<p class='user_Tot'>登录成功{$yongxiang}</p>";
			header("Refresh:1;url=register.php");
			// die();
		}else{
			echo "<p class='user_Tot'>登录失败</p>".mysqli_error($conn);
			header("Refresh:1;url=denglu_save.php");
		}
	mysqli_close($conn);
	// include ("04_p.style.php");
 ?>

<script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery.min.js"></script>
<script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>