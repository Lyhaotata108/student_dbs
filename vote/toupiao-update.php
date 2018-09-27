<?php 
  include("head.php");
$xinid = empty($_GET['xinid'])?"xinid":$_GET['xinid'];
if ($xinid=="null") {
    die("请选择要修改的记录");
  }else{
    include("conn.php");
    $sql3="select * from vote where id='{$xinid}'";  
    $result3 = mysqli_query($conn,$sql3);
    if (mysqli_num_rows($result3)>0){
      $row = mysqli_fetch_assoc($result3);
    }else{
      echo "没有数据";
    }
    mysqli_close($conn);
  }
 ?>       
<div class="sui-layout">
  <div class="sidebar sidebar_left">
  <?php include("lefmenu.php"); ?>
   </div>
  <div class="content">
      <p class="sui-text-xxlarge my-padd">增加候选人</p>
      <img src="<?php echo $row['pic']; ?>" alt=""  style="width: 100px;height: 100px; float: right; margin-right: 300px;">
     <form class="sui-form form-horizontal sui-validate" action="toupian-list.php" method="post" id="form1" enctype="multipart/form-data">
        <div class="control-group">
          <label for="mingcheng" class="control-label">活动名称</label>
          <div class="controls">
           <input type="hidden" value="huodongs" name="genggai">
       <input type="hidden" value="<?php echo $row['id']; ?>" name="gengid">
            <input type="text" id="mingcheng" name="mingcheng" class="input-large input-fat" placeholder="输入活动名称" data-rules="required|minlength=2|maxlength=100">
          </div>
        </div>
        <div class="control-group">
          <label for="name" class="control-label">姓名：</label>
          <div class="controls">
            <input type="text" id="xingming" name="xingming" value="<?php echo $row['name']; ?>" class="input-large input-fat" placeholder="输入姓名" data-rules="required|minlength=2|maxlength=5">
          </div>
        </div>
        <div class="control-group">
          <label for="sName" class="control-label">图片:</label>
          <div class="controls">
            <input type="file" name="file"/>
          </div>
        </div>
        <div class="control-group">
          <label for="zhiwei" class="control-label">职位：</label>
          <div class="controls">
            <input type="text" id="zhiwei" class="input-large input-fat"  value="<?php echo $row['position']; ?>" name="zhiwei">
          </div>
        </div>
        <div class="control-group">
          <label for="jianli" class="control-label">个人简历：</label>
          <div class="controls">
            <textarea class="input-xxlarge" name="jianli"><?php echo $row['summary']; ?></textarea>
          </div>
        </div>
        <div class="control-group">
          <label for="jianjie" class="control-label">案例简介：</label>
          <div class="controls">
            <textarea class="input-xxlarge" name="jianjie" value=""><?php echo $row['caseshow']; ?></textarea>
          </div>
        </div>
        <div class="control-group">
          <label for="urls" class="control-label">案例链接：</label>
          <div class="controls">
            <input type="text" id="lianjie" name="lianjie" class="input-large input-fat" placeholder="输入案例连接" data-rules="required|minlength=2|maxlength=5" value="<?php echo $row['url']; ?>">
          </div>
        </div>
        <div class="control-group">
          <label for="piaoshu" class="control-label">票数：</label>
          <div class="controls">
            <input type="text" id="piaoshu" name="piaoshu" class="input-large input-fat" placeholder="输入票数" data-rules="required|minlength=2|maxlength=5" value="<?php echo $row['votenum']; ?>">
          </div>
        </div>
        <div class="control-group">
          <label for="youxiao" class="control-label">有效状态</label>
          <div class="controls">
           <select id="youxiao" name="youxiao">
           <?php 
       if ($row['status']=="1") {
        echo "<option value='1'>正常</option>";
        echo "<option value='2'>禁用</option>";
       }else{
        echo "<option value='2'>禁用</option>";
        echo "<option value='1'>正常</option>";
       }
       ?>          
           </select>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label"></label>
          <div class="controls">
            <input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary">
          </div>
        </div>    
      </form>
      </div>
    </div>    
<?php include("foot.php") ?>  


