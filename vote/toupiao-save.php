<?php 
	include("conn.php");
	$xinid = empty($_GET["xinid"]) ? "null": $_GET["xinid"];
	if( $xinid == "null"){
		// 姓名
	    $xingming = empty($_POST['xingming']) ? "null":$_POST['xingming'];
	    // 职位
	    $zhiwei = empty($_POST['zhiwei']) ? "null":$_POST['zhiwei'];
	    // 个人简历
	    $jianli = empty($_POST['jianli']) ? "null":$_POST['jianli'];
	    // 案例简介
	    $jianjie = empty($_POST['jianjie']) ? "null":$_POST['jianjie'];
	    // 案例连接
		$lianjie= empty($_POST["lianjie"])?"null":$_POST["lianjie"];
		// 票数
		$piaoshu= empty($_POST["piaoshu"])?"null":$_POST["piaoshu"];
		// 禁用
		$youxiao= empty($_POST["youxiao"])?"null":$_POST["youxiao"];
		// 判断是否为修改的页面
		$genggai= empty($_POST["genggai"])?"add":$_POST["genggai"];
		// 接收图片
		if (empty($_FILES["file"]['tmp_name'])) {

		}else{
			if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "video/mp4")
			|| ($_FILES["file"]["type"] == "image/pjpeg"))
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
		}
		
		if ($genggai =="add"){
				if (empty($filename)) {
					$sql="insert into vote (name,summary,caseshow,position,url,votenum,status) value('$xingming','$jianli','$jianjie','$zhiwei','$lianjie','$piaoshu','$youxiao')";
				}else{
					$sql="insert into vote (name,summary,caseshow,position,pic,url,votenum,status) value('$xingming','$jianli','$jianjie','$zhiwei','$filename','$lianjie','$piaoshu','$youxiao')";
				}
			var_dump($sql);
		}else  if($genggai=="huodongs"){
				$gengid = $_POST["gengid"];
				if (empty($filename)) {
					$sql = "update vote set name='{$xingming}',summary='{$jianli}',caseshow='{$jianjie}',position='{$zhiwei}',url='{$lianjie}',votenum='{$piaoshu}',status='{$youxiao}' where id = '{$gengid}'";
				}else{
					$sql = "update vote set name='{$xingming}',summary='{$jianli}',caseshow='{$jianjie}',position='{$zhiwei}',pic='{$filename}',url='{$lianjie}',votenum='{$piaoshu}',status='{$youxiao}' where id = '{$gengid}'";
				}
		}else{
			die("请选择方法");
		}
	}else{
		$sql ="delete from vote where id='{$xinid}' ";

	}
	$result = mysqli_query($conn,$sql);
	if ($result) {
		echo "<p class='pp'>数据添加成功</p>";
		header("Refresh:1;url='toupian-list.php'");
	}else{
		echo "<p class='pp'>数据删除失败</p>".mysqli_error($conn);
		header("Refresh:1;url='shuju-delte.php'");
	}
	mysqli_close($conn);
 ?>
