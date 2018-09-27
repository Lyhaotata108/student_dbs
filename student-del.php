<?php
//创建连接
include("conn.php");

//执行SQL语句
$sql="delete from student where id='{$_GET['banid']}'";
$result =mysqli_query($conn, $sql);
// 判断删除的语句
if ($result) {
	echo "<script>alert('数据删除成功')</script>";
	header("Refresh:1;url=student-list.php");
	// echo"更新数据成功";
}else{
	echo"数据删除失败".mysqli_error($conn);
}
// 关闭数据库
// mysqli_close($conn);
?>