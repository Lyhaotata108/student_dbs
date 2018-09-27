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
	.bjAan{
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
$sNumber= empty($_POST["sNumber"])?"att":$_POST["sNumber"];
$bjNumber =empty($_POST["bjNumber"])?"att":$_POST["bjNumber"];
$sName =empty($_POST["sName"])?"att":$_POST["sName"];
$sSex=empty($_POST["sSex"])?"0":$_POST["sSex"];
$sBrithday=empty($_POST["sBrithday"])?"att":$_POST["sBrithday"];
$sPhone=empty($_POST["sPhone"])?"att":$_POST["sPhone"];
$Studentider=empty($_POST["Studentider"])?"att":$_POST["Studentider"];

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
||($_FILES["file"]["type"] == "video/mp4")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 10241000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "错误: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "文件名: " . $_FILES["file"]["name"] ."<br />";
    echo "文件类型: " . $_FILES["file"]["type"] ."<br />";
    echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "暂存目录: " . $_FILES["file"]["tmp_name"]. "<br />";
    }
  }
else
  {
  echo "您上传的文件不符合要求！";
  }
if ($_FILES["file"]["error"] > 0)
  {
  echo "错误: " . $_FILES["file"]["error"] . "<br />";
  }
else
  {
  // 重新给上传的文件命名，增加一个年月日分秒的前缀，并且加上保存路径
   $filename = "upload/".date('YmdHis').$_FILES["file"]["name"];
   //move_uploaded_file()移动临时文件到上传的文件存放的位置,参数1.临时文件的路径, 参数2.存放的路径
	move_uploaded_file($_FILES["file"]["tmp_name"],$filename);  
}
if ($Studentider=="att"){
	$ban_tian="<h2 class='bAan'>数据添加成功</h2>";
	$ban_tian1="<h2 class='bj'>数据添加失败</h2>";	
	$banji_Char="insert into student
	(学号,班号,照片,姓名,性别,出生日期,电话)values
	('$sNumber','$bjNumber','$filename','$sName','$sSex','$sBrithday','$sPhone')";
}else if($Studentider=="studenTName"){
	$ban_tian="<h2 class='bjAan'>数据更新成功</h2>";
	$ban_tian1="数据更新失败";
	// $ban_Xin=$_POST["ban_Xin"];
	$banid=$_POST["banid"];
	$banji_Char="update student set 
	学号='{$sNumber}',班号='{$bjNumber}',照片='{$filename}',
	姓名='{$sName}',性别='{$sSex}' ,出生日期='{$sBrithday}',电话='{$sPhone}'where id='{$banid}'";
	echo $banji_Char;
}else{
	die("请选择操作方法");
}

include("conn.php");
$result =mysqli_query($conn, $banji_Char);

if ($result){
	echo $ban_tian;
	header("Refresh:1000;url=index3.php");	
	echo"<h2 class='bjAan'>数据更新成功</h2>";
}else{
	echo $ban_tian1;
}
?>