<?php include("head.php");
 ?>   
  <div class="sui-layout">
      <div class="sidebar sidebar_left">
  <?php include("lefmenu.php"); ?>
  </div>
      <div class="content">
      <p class="sui-text-xxlarge my-padd">增加候选人</p>
      <form class="sui-form form-horizontal sui-validate" action="toupiao-save.php" method="post" id="form1" enctype="multipart/form-data">
        <div class="control-group">
          <label for="mingcheng" class="control-label">活动名称</label>
          <div class="controls">
            <input type="text" id="mingcheng" name="mingcheng" class="input-large input-fat" placeholder="输入活动名称" data-rules="required|minlength=2|maxlength=100">
          </div>
        </div>
        <div class="control-group">
          <label for="name" class="control-label">姓名：</label>
          <div class="controls">
            <input type="text" id="xingming" name="xingming" class="input-large input-fat" placeholder="输入姓名" data-rules="required|minlength=2|maxlength=5">
          </div>
        </div>
        <div class="control-group">
          <label for="sName" class="control-label">图片：</label>
          <div class="controls">
            <input type="file" name="file" />
          </div>
        </div>
        <div class="control-group">
          <label for="zhiwei" class="control-label">职位：</label>
          <div class="controls">
            <input type="text" id="zhiwei" class="input-large input-fat"  value="" name="zhiwei">
          </div>
        </div>
        <div class="control-group">
          <label for="jianli" class="control-label">个人简历：</label>
          <div class="controls">
            <textarea class="input-xxlarge" name="jianli"></textarea>
          </div>
        </div>
        <div class="control-group">
          <label for="jianjie" class="control-label">案例简介：</label>
          <div class="controls">
            <textarea style="height: 100px; width: 260px;" class="input-xxlarge" name="jianjie"></textarea>
          </div>
        </div>
        <div class="control-group">
          <label for="urls" class="control-label">案例链接：</label>
          <div class="controls">
            <input type="text" id="lianjie" name="lianjie" class="input-large input-fat" placeholder="输入案例连接" data-rules="required|minlength=2|maxlength=5">
          </div>
        </div>
        <div class="control-group">
          <label for="piaoshu" class="control-label">票数：</label>
          <div class="controls">
            <input type="text" id="piaoshu" name="piaoshu" class="input-large input-fat" placeholder="输入票数" data-rules="required|minlength=2|maxlength=5">
          </div>
        </div>
        <div class="control-group">
          <label for="youxiao" class="control-label">有效状态</label>
          <div class="controls">
           <!--  <input type="text" id="bjNumber" name="bjNumber" class="input-large input-fat"   placeholder="输入班号" data-rules="required"> -->
           <select id="youxiao" name="youxiao">
          <option value='1'>正常</option>
          <option value='2'>禁用</option>
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