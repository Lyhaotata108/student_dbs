<!-- 头部开始 -->
<?php include("head.php"); ?>
<?php
include("conn.php");
$sql4="select 课程编号,课程名,时间 from kecheng";
$result =mysqli_query($conn, $sql4 );
// 关闭数据库
// mysqli_close($conn);
?>
<!-- 左部开始 -->
  <div class="sidebar sidebar_left">
 	<?php include("leftmenu.php"); ?>
  </div>
 			<div class="content">
				<p class="sui-text-xxlarge sui_ck">课程列表</p>
				   <table class="sui-table table-primary">
                                   <tr>  
                                     <th>课程编码</th>
                                     <th>课程名</th>
                                     <th>时间</th>
                                     <th>操作</th>
                                   </tr>
                                  <?php
                                  if(mysqli_num_rows($result)> 0 ){
                                     // 将查询的结果转换为下列数组
                                    while($row=mysqli_fetch_assoc($result)){
                                    echo "<tr>
                                      <td>{$row['课程编号']}</td>
                                      <td>{$row['课程名']}</td>
                                      <td>{$row['时间']}</td>
                                      <td>
                                            <a  class='sui-btn btn-warning' href='kecheng-update.php?
                                             kid={$row['课程编号']}' title=''>修改</a>
                                            &nbsp;&nbsp;<a class='sui-btn btn-danger'href='kecheng-del.php? 
                                            kid={$row['课程编号']}' title='' >删除</a>
                                      </td>   
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