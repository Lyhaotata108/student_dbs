
<?php
// php中的数组 枚举数组和关联数组
$a=array(
	0=>array(
	'班号'=>'1712B',
	'班长'=>'张三',
	'教室'=>'303东',
	'班主任'=>'秦红亮'
	),
	1=>array(
	'班号'=>'1712C',
	'班长'=>'赵四',
	'教室'=>'303西',
	'班主任'=>'李一新'
	),
	2=>array(
	'班号'=>'1712D',
	'班长'=>'赵四',
	'教室'=>'303东',
	'班主任'=>'关玉奇'
	)

);
// 复杂变量的打印输出
// echo $a;
// echo "<br>";
// var_dump($a[2]['班号']);
// echo"<table><tr><td>班号</td><td>班长</td><td>教室</td><td>班主任</td></tr>";
// foreach ($a as $key =>$value){
// 	echo"<tr>";
// 	echo"<td>".$value["班号"]."</td>";
// 	echo"<td>".$value["班长"]."</td>";
// 	echo"<td>".$value["教室"]."</td>";
// 	echo"<td>".$value["班主任"]."</td>";
// 	echo"</tr>";
// }
// echo"</table>";







//php中的关联数组,以键值对的形式保存数据
// $b=array(
// "老大"=>"张王杰",
// "老二"=>"张三",
// "老三"=>"李四",
// // "msg"=>$a
// );
// var_dump($b["老二"] );
// // var_dump($b["msg"][4] );

// // foreach循环访问数组中的每一项
// // foreach 循环访问数组中的每一个键值对，$key保存键， $value保存值
// foreach ($b as $key => $value) {
// 	echo "键为: ".$key." 	值为:".$value."<br>";
// 	// 如果使用echo输出时，可以用{}把变量括起来，php会自动将变量替换
// 	echo "键为: {$key},值为:{$value}<br>";
// }
// // var_dump(REMOTE_ADDR);
?>
<table>
<tr><th>班号</th><th>班长</th><th>教室</th><th>班主任</th></tr>
<?php
foreach ($a as $key =>$value){
	echo"<tr>";
	echo"<td>".$value["班号"]."</td>";
	echo"<td>".$value["班长"]."</td>";
	echo"<td>".$value["教室"]."</td>";
	echo"<td>".$value["班主任"]."</td>";
	echo"</tr>";
}
?>
</table>
