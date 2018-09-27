<!-- 头部开始 -->
<?php include("head.php"); ?>
<?php
include("conn.php");
// 姓名
$Xname=empty($_POST["Xname"])?"null":$_POST["Xname"];
// 学生
$student_Number=empty($_POST["Number"])?"null":$_POST["student_Number"];
// 判断
$Cgrade=empty($_POST["Cgrade"])?"null":$_POST["student_Number"];
$StudentchaName =empty($_POST['StudentchaName'])? "null":$_POST['StudentchaName'];
$student_Number = $_POST["student_Number"];
$xuanNumber = $_POST["xuanNumber"];
  if ($StudentchaName=="null") {
    $sql4="SELECT * FROM xuanxiu AS x LEFT JOIN kecheng AS k ON x.课程编号=k.课程编号 LEFT JOIN student as s ON x.学号=s.学号 WHERE s.姓名 = '{$StudentchaName}' AND k.课程编号 = '{$xuanNumber}'";
  }else{
    $Xname=$_POST["Xname"];
    $student_Number=$_POST["student_Number"];
     $sql4= "SELECT * FROM xuanxiu AS x LEFT JOIN kecheng AS k ON x.课程编号=k.课程编号 LEFT JOIN student as s ON x.学号=s.学号 WHERE x.学号 = '{$student_Number}' AND x.课程编号 = '{$xuanNumber}'";
  }
$result =mysqli_query($conn, $sql4 );
// 关闭数据库班号
// mysqli_close($conn);
?>
<!-- 左部开始 -->
  <div class="sidebar sidebar_left">
 	<?php include("leftmenu.php"); ?>
  </div>
 			<div class="content">
				<p class="sui-text-xxlarge sui_ck">成绩列表</p>
				   <table class="sui-table table-primary">
                                   <tr>  
                                     <th>姓名</th>
                                     <th>学号</th>
                                     <th>成绩</th>
                                     <th>课程名</th>
                                   </tr>
                                  <?php
                                  if(mysqli_num_rows($result)> 0 ){
                                     // 将查询的结果转换为下列数组
                                    while($row=mysqli_fetch_assoc($result)){
                                      // $rows=$row["性别"]=="1"?"男":"女";
                                    echo "<tr>
                                        <td>{$row['学号']}</td>
                                        <td>{$row['姓名']}</td>
                                        <td>{$row['课程名']}</td>
                                        <td>{$row['成绩']}</td>
                                          </tr>";
                                    }
                                  }else{
                                    echo "没有记录";
                                  }
                                ?>
                </table>
</div>
</div>
<!-- 底部 -->
<?php include("foot.php"); ?>