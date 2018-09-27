 <?php 
	$xinid = empty($_GET["xinid"]) ? "null": $_GET["xinid"];
	include("conn.php");
	if( $xinid == "null"){
	    $huiMing = empty($_POST['yhname']) ? "null":$_POST['yhname'];
	    $password = empty($_POST['password']) ? "null":$_POST['password'];
	    $question = empty($_POST['question']) ? "null":$_POST['question'];
		$answer= empty($_POST["answer"])?"add":$_POST["answer"];
		$xinid = $_POST["xinid"];
			$sql = "update user set name='{$huiMing}',password='{$password}',question='{$question}',answer='{$answer}' where id = '{$xinid}'";
			$ad="修改";
			$dz="huiyuan_lisst.php";
		
	}else{
		$sql ="delete from user where id ='{$xinid}' ";
		session_start();
		unset($_SESSION["usname"]);
		header("Refresh:0;url=login.php"); 
	}
	
	$result = mysqli_query($conn,$sql);
	if ($result) {
		echo "<p class='att'>数据主次额成功</p>";
		header("Refresh:1;url=huiyuan_lisst.php");
	}else{
		echo "<p class='att'>数据删除失败</p>".mysqli_error($conn);
	}
	mysqli_close($conn);

 ?>
 <style>
	.att{
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