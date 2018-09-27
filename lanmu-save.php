<style type="text/css" media="screen">
	.bAan{
		width:200px;
		height:100px;
		margin:50px auto;
		font-size:25px;
		line-height:100px;
		text-align:center;
		border-radius:10px;
		background-color:#e2e2ee;
	}
	.bj{
		width:250px;
		height:150px;
		margin:50px auto;
		font-size:25px;
		line-height:100px;
		text-align:center;
		border-radius:10px;
		background-color:#e2e2ee;
	}
</style>
<?php
$Lanmu=empty($_POST["Lanmu"])?"att":$_POST["Lanmu"];
$ban_Xin=empty($_POST["ban_Xin"])?"att":$_POST["ban_Xin"];
// echo $ban_Xin;
if ($ban_Xin=="att"){
	$ban_tian="<h2 class='bAan'>数据添加成功</h2>";
	$ban_tian1="<span class='bj'>数据添加失败</span>";
	$banji_Char="insert into new_column
	(name)values
	('$Lanmu')";
}else if($ban_Xin=="gxName"){
	$ban_tian="<h2 class='bAan'>数据更新成功</h2>";
	$ban_tian1="<h2 class='bj'>数据更新失败</h2>";
	// $ban_Xin=$_POST["ban_Xin"];
	$ban=$_POST["ban"];
	$banji_Char="update new_column set 
	name='{$Lanmu}' where id='{$ban}'";	
}else{
	die("请选择操作方法");
}

include("conn.php");
$result =mysqli_query($conn, $banji_Char);

if ($result){
	echo $ban_tian;
	header("Refresh:1;url=lan-list.php");
}else{
	echo $ban_tian1;
}

?>