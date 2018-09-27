<style type="text/css" media="screen">
           
</style>
<!-- 头部开始 -->
<?php include("head.php"); ?>
<?php 
$banid=empty($_GET["banid"])?"att":$_GET["banid"];
if ($banid=="att") {
 die("请选择要修改的记录");
}else{
 include("conn.php");

//执行SQL语句
$sql="select *from new_column where id='{$banid}'";
$result =mysqli_query($conn, $sql);
// 输出数据
if (mysqli_num_rows($result) > 0 ) {
  // 将查询的结果转换为下列数组
  $row = mysqli_fetch_assoc($result);
  }else{
      echo "没有数据";
  }
// 关闭数据库
mysqli_close($conn);
}
 ?>
<!-- 左部开始 -->
  <div class="sidebar sidebar_left">
  <?php include("leftmenu.php"); ?>
  </div>
      <div class="content">
        <p class="sui-text-xxlarge sui_ck">栏目修改</p>
        <form class="sui-form form-horizontal sui-validate"action="lanmu-save.php" method="post">
           <div class="control-group">
                <label for="inputEmail" class="control-label">栏目:</label>
                <div class="controls">
                                        <!-- 增加一个隐藏的input用来区分是新增的 -->
                                        <input type="hidden" name="ban_Xin" value="gxName">
                                    <!-- 增加一个隐藏的input，保存班号 -->
                                        <input type="hidden" name="ban" value="<?php echo $row['id']; ?>">
                          <input type="text" id="Lanmu"name="Lanmu"; 
                                 class="input-large input-fat" placeholder="输入班号名称" 
                                  data-rules="required|minlength=2|maxlength=10" value="<?php echo $row['name']; ?>">
              </div>
            </div>
            <div class="control-group">
            <label class="control-label"></label>
            <div class="controls">
              <input type="submit" name="" value="提交" class="sui-btn btn-large btn-primary">
            </div>
            </div>
        </form>
      </div>
    </div>
<!-- 底部 -->
<?php include("foot.php"); ?>