<!-- 头部开始 -->
<?php include("head.php"); ?>
<?php
include("conn.php");
$sql4="select 班号,班长,教室,班主任,班级口号  from banji";
$result =mysqli_query($conn, $sql4 );
// 关闭数据库
// mysqli_close($conn);
?>
<!-- 左部开始 -->
  <div class="sidebar sidebar_left">
 	<?php include("leftmenu.php"); ?>
  </div>
 			<div class="content">
				<p class="sui-text-xxlarge sui_ck">班级列表</p>
				   <table class="sui-table table-primary">
                                   <tr>  
                                     <th>班号</th>
                                     <th>班长</th>
                                     <th>教室</th>
                                     <th>班主任</th>
                                     <th>班级口号</th>
                                      <th>操作</th>
                                   </tr>
                                  <?php
                                  if(mysqli_num_rows($result)> 0 ){
                                     // 将查询的结果转换为下列数组
                                    while($row=mysqli_fetch_assoc($result)){
                                    echo "<tr>
                                      <td>{$row['班号']}</td>
                                      <td>{$row['班长']}</td>
                                      <td>{$row['教室']}</td>
                                        <td>{$row['班主任']}</td>
                                        <td>{$row['班级口号']}</td>
                                      <td>
                                            <a  class='sui-btn btn-warning' title=''href='banji-update.php?
                                             banid={$row['班号']}' >修改</a> 
                                              &nbsp; <a class='sui-btn btn-danger' title=''
                                             href='banji-del.php?
                                             banid={$row['班号']}'  >删除</a>
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