<!-- 头部开始 -->
<?php include("head.php"); ?>
<?php
include("conn.php");
$huiyuan = empty($_SESSION['houid']) ? "null": $_SESSION['houid'];
// echo $huiyuan;.
if ($huiyuan=="null") {
  $er="select * from  vote";
  echo $er;
}else{
   $er="select * from  user where houid='{$huiyuan}'";
}

$result =mysqli_query($conn, $er);
// 关闭数据库
mysqli_close($conn);
?>
 <div class="sidebar sidebar_left">
  <?php include("lefmenu.php"); ?>
  </div>
      <div class="content">
      <p class="sui-text-xxlarge my-padd">会员管理</p>
      <table class="sui-table table-primary">
                                   <tr>  
                                     <th>id</th>
                                     <th>姓名</th>
                                     <th>职务</th>
                                     <th>得票数</th>
                                      <th>操作</th>
                                   </tr>
                                  <?php
                                  if(mysqli_num_rows($result)> 0 ){
                                     // 将查询的结果转换为下列数组
                                    while($row2=mysqli_fetch_assoc($result)){
                                    echo "<tr>
                                      <td>{$row2['id']}</td>
                                      <td>{$row2['name']}</td>
                                      <td>{$row2['position']}</td>
                                      <td>{$row2['votenum']}</td>
                                      <td>
                                            <a  class='sui-btn btn-warning' title=''href='toupiao-update.php?xinid={$row2['id']}' >修改</a> 
                                              &nbsp; <a class='sui-btn btn-danger' title=''
                                             href='toupiao-save.php?xinid={$row2['id']}'  >删除</a>
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
