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
		if ($yonghu=="null"){
				  	$sql1="select * from user where email = '{$yongxiang}'";
				  	 $att = mysqli_query($conn,$sql1);
				if (mysqli_num_rows($att) >=1) {
					$_SEESION["usname"]=$yongxiang;
					echo "ok";	
					}else{
					echo "orr";	
					}
		}else{
			$sql="insert into user(id,email,name,password,question,answer) value('$yongxiang','$yonghu','$password','$miTshi','$daAan')";				
				var_dump($sql);
				$result = mysqli_query($conn,$sql);
				if ($result) {
					echo"ok";
				}else{
					echo "orr";
				}			
		}
mysqli_close($conn); 
?><style type="text/css" media="screen">
	.cj{
		width:200px;
		height:100px;
		line-height:100px;
		text-align:center;
		border-radius:10px;
		background-color:#e2e2ee;
		margin:50px auto;
	}
</style>
<?php
$xHao=empty($_POST["xHao"])?"att":$_POST["xHao"];
$xuanNumber=empty($_POST["xuanNumber"])?"att":$_POST["xuanNumber"];
$chengjiName=empty($_POST["chengjiName"])?"att":$_POST["chengjiName"];

$Studentider=empty($_POST["Studentider"])?"att":$_POST["Studentider"];
if ($Studentider=="att"){
	$ban_tian="<h2 class='cj'>数据添加成功</h2>";
	$ban_tian1="数据添加失败";
	$banji_Char="insert into xuanxiu
	(学号,课程编号,成绩)values
	('$xHao','$xuanNumber','$chengjiName')";
}else if($Studentider=="studenTName"){
	$ban_tian="数据更新成功";
	$ban_tian1="数据更新失败";
	$kgrAde=$_POST["kgrAde"];
	$banji_Char="update xuanxiu set 
	学号='{$xHao}',课程编号='{$xuanNumber}',
	成绩='{$chengjiName}'where 课程编号='{$kgrAde}'";	
}else{
	die("请选择操作方法");
}

include("conn.php");
$result =mysqli_query($conn, $banji_Char);

if ($result){
	echo $ban_tian;
	header("Refresh:1;url=index4.php");	
	// echo"更新数据成功";
}else{
	echo $ban_tian1.mysqli_error($conn);
}

?>
<script type="text/javascript">
	
	$(function(){
		$(".cj").on("myclick",function(){
			$(".cj").show();
		}).trigger("myclick",["自动触发了","myclick事件"]);
		
	})
</script>