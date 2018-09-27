<?php
// 四大步
//1.登录连接数据库
//mysqli_connect(服务器地址,账号,密码)
// 返回值:如果连接成功返回true，否则返回false
$conn=mysqli_connect("localhost","root","");

if ($conn) {
echo "数据连接成功";	# code...
}else{
echo "连接失败";
}
//2.选择要操作的数据库 	
mysqli_select_db($conn, "student_dbs");	
//3.运行SQL,执行增，删，改，查
// 设置读取数据库的编码，不然有可能显示乱码
mysqli_query($conn,"set names utf8");
$sql ="insert into book (id,bookname,auther,price,time)value('1','《知耻而后勇》','李勇','40','2018-9-1')"; 
$sq2="select from book set bookname='《你在努力吗？》";
$sq3="update book set bookname='《一静知清》' where id='1'";
$sq4=" ALTER TABLE	book CHANGE COLUMN  大家好 id varchar(100);";
$sq5="delete from book where id='1'";
$sq6="select * from book";
$result = mysqli_query($conn,$sq6);

$array =array();
if (mysqli_num_rows($result)>0) {
	echo"找到了".mysqli_num_rows($result)."条记录";
	// 将查询结果转换为数组,才显示在网页上
	while($arr =mysqli_fetch_object($result)){
		$array[]=$arr;
	}
	$a[]=$arr;
	 echo"<table><tr><td>id</td><td>bookname</td><td>auther</td><td>price</td></tr>";
foreach ($a as $key =>$value){
	echo"<tr>";
	echo"<td>".$value["班号"]."</td>";
	echo"<td>".$value["班长"]."</td>";
	echo"<td>".$value["教室"]."</td>";
	echo"<td>".$value["班主任"]."</td>";
	echo"</tr>";
}
echo"</table>";
}
if ($result) {
	echo"数据查询成功";
}else{
	echo"数据查询失败";
}
//4.关闭连接，释放资源
mysqli_close($conn );
?>