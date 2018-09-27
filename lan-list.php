<!-- 头部开始 -->
<?php include("head.php"); ?>
<?php
include("conn.php");
$sql4="select * from new_column";
$result =mysqli_query($conn, $sql4 );
// 关闭数据库
// mysqli_close($conn);
?>
<!-- 左部开始 -->
  <div class="sidebar sidebar_left">
 	<?php include("leftmenu.php"); ?>
  </div>
 			<div class="content">
				<p class="sui-text-xxlarge sui_ck">栏目列表</p>
				   <table class="sui-table table-primary">
                                   <tr>  
                                     <th>id</th>
                                      <th>name</th>
                                      <th>操作</th>
                                   </tr>
                                  <?php
                                  if(mysqli_num_rows($result)> 0 ){
                                     // 将查询的结果转换为下列数组
                                    while($row=mysqli_fetch_assoc($result)){
                                    echo "<tr>
                                    <td>{$row['id']}</td>
                                      <td>{$row['name']}</td>
                                      <td>
                                            <a  class='sui-btn btn-warning' title=''href='lan-update.php?banid={$row['id']}' >修改</a>
                                            &nbsp; <a class='sui-btn btn-danger' title='' href='lan-del.php?ban_Xin={$row['id']}'>删除</a>
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