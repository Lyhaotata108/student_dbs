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
		line-height:150px;
		text-align:center;
		border-radius:10px;
		background-color:#e2e2ee;
	}
</style>
<?php
include("conn.php");
// 标题
$headBiao= empty($_POST["headBiao"])?"att":strtolower($_POST["headBiao"]);
// 肩题
$jianTi =empty($_POST["jianTi"])?"att":$_POST["jianTi"];
// 栏目
$Lanmu =empty($_POST["Lanmu"])?"att":$_POST["Lanmu"];
// 时间
$Time=empty($_POST["Time"])?"att":$_POST["Time"];
// $file=$_FILES["file"]["name"];
// 图片
// $picTure=empty($_POST["picTure"])?"att":$_POST["picTure"];
// 内容
$content=empty($_POST["content"])?"att":$_POST["content"];
// 作者
$usid =empty($_POST["usid"])?"0":$_POST["usid"];

$action= empty($_POST["action"])?"add":$_POST["action"];

	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "video/mp4")
	|| ($_FILES["file"]["type"] == "imagepeg"))
	&& ($_FILES["file"]["size"] < 10241000)){
		if ($_FILES["file"]["error"] > 0) {
		  echo "错误: " . $_FILES["file"]["error"] . "<br />";
		 }else{
		 	//重新给上传的文件命名，增加一个年月日时分秒的前缀，并且加上保存路径
		 	$filename = "upload/".date('YmdHis').$_FILES["file"]["name"];
			//move_uploaded_file()移动临时文件到上传的文件存放的位置,参数1.临时文件的路径, 参数2.存放的路径
			move_uploaded_file($_FILES["file"]["tmp_name"],$filename); 
			// echo $filename; 	 	
		}
	}else{
		echo "您上传的文件不符合要求！";
	}	
	if ($action=="add") {
		$strone = "<p class=bAan>数据添加成功!</p>";
		$strTw0 = "<p class=bj>数据添加失败!</p>";
		// $url="xinwenindex7.php";
		$sql="insert into news(标题,肩题,图片,内容,发布时间,创建时间,userid,columnid) value('$headBiao','$jianTi','$filename','$content','$Time',".time().",'$usid','$Lanmu')";
		echo $sql;
		
	}else  if($action=="genggai"){
			$s3="select * from vote where 标题= '{$headBiao}' and 肩题='{$jianTi}'";
			$r8 = mysqli_query($conn,$s3);
			if (mysqli_num_rows($r8) >0) {
				// echo "<p class='pp'> 标题: {$headBiao}已经重复添加</p>";
				header("Refresh:1;url=index.php");
				die();
			}else{
				$xinid = $_POST["xinid"];
				if (empty($filename)) {
				$sql = "update vote set 标题='{$headBiao}',肩题='{$jianTi}',图片='{$filename}',内容='{$content}',userid='{$usid}',columnid='{$Lanmu}',发布时间='{$Time}' where id = '{$xinid}'";
				}else{
					$sql ="update vote set 标题='{$headBiao}',肩题='{$jianTi}',图片='{$filename}',内容='{$content}',userid='{$usid}',columnid='{$Lanmu}',发布时间='{$Time}' where id = '{$xinid}'";
				}
			}
			
		}else{
			die("请选择方法");
		}

	$result = mysqli_query($conn, $sql);
	// 输出数据
	if ($result) {
		echo "<p class=bAan>数据更新成功!</p>";
		header("Refresh:2; url=index.php");
	}else{
		echo "<p class=bj>数据更新失败!</p>".mysqli_error($conn);
	}

	// 关闭数据库
	mysqli_close($conn);
?>