<!-- 头部开始 -->
<?php include("head.php"); ?>
<?php
include("conn.php");
$StudentchaName =empty($_POST['StudentchaName'])? "null":$_POST['StudentchaName'];
  if ($StudentchaName=="null") {
    $sql4="select id,学号,班号,姓名,性别,出生日期,电话 from student";
  }else{
    $sNumber=$_POST["sNumber"];
    $sPhone=$_POST["sPhone"];
     $sql4="select id,学号,班号,姓名,性别,出生日期,电话 from student where 学号='{$sPhone}'and 姓名 ='{$sNumber}'";
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
				<p class="sui-text-xxlarge sui_ck">学生列表</p>
				   <table class="sui-table table-primary" >
                                   <tr>  
                                     <th>id</th>
                                     <th>学号</th>
                                     <th>班号</th>
                                     <th>图片</th>
                                     <th>姓名</th>
                                     <th>性别</th>
                                     <th>出生日期</th>
                                     <th>电话</th>
                                     <th>操作</th>
                                   </tr>
                                   <tbody id="studentlist"></tbody>
                                  <?php
                                  // if(mysqli_num_rows($result)> 0 ){
                                  //    // 将查询的结果转换为下列数组
                                  //   while($row=mysqli_fetch_assoc($result)){
                                  //     $rows=$row["性别"]=="1"?"男":"女";
                                  //   echo "<tr>
                                  //     <td>{$row['id']}</td>
                                  //     <td>{$row['学号']}</td>
                                  //     <td>{$row['班号']}</td>
                                  //       <td>{$row['姓名']}</td>
                                  //       <td>{$rows}</td>
                                  //       <td>{$row['出生日期']}</td>
                                  //       <td>{$row['电话']}</td>
                                  //     <td>
                                  //           <a  class='sui-btn btn-warning' title=''href='student-update.php?Studentider={$row['id']}' >修改</a> 
                                  //             &nbsp; <a class='sui-btn btn-danger' title=''
                                  //            href='student-del.php?banid={$row['id']}'  >删除</a> 
                                  //     </td>   
                                  //     </tr>";
                                  //   }
                                  // }else{
                                  //   echo "没有记录";
                                  // }
                                ?>
                </table>
</div>
</div>
<!-- 底部 -->
<?php include("foot.php"); ?>
<script type="text/html" id="template1">
              {{each arr val idx}}
                    <tr>
                            <td>{{val.id}}</td> 
                            <td>{{val.学号}}</td>    
                            <td>{{val.班号}}</td> 
                            <td>{{val.图片}}</td> 
                            <td>{{val.姓名}}</td> 
                            <td>{{val.性别}}</td> 
                            <td>{{val.出生日期}}</td> 
                            <td>{{val.电话}}</td> 
                            <td>
                                      <a  class='sui-btn btn-warning' title=''href='student-update.php?Studentider={$row['id']}' >修改</a> 
                                      &nbsp; <a class='sui-btn btn-danger' title=''
                                       href='student-del.php?banid={$row['id']}'  >删除</a> 
                            </td>
                    </tr> 
              {{/each}}
</script>
<script type="text/javascript" src="js/template-web (1).js"></script>
<script type="text/javascript">
  $(function(){
      $.ajax({
        url:"api.php",
        type:"POST",
        dataType:"json",
        data:{
          "action":"student"
        },
            beforeSend:function(XMLHttpRequest){
                      $("#studentlist").empty();
                  // $("#studentlist").html("<tr><td>正在查询,请稍后.....</td></tr>")
            },
            success:function(data,textStatus){
                            console.log(data);
                                    if (data.code==200){
                                            // att(data);
                                            var arr =data.data;
                                            var html =template("template1",{"arr":arr});
                                              $("#studentlist").html(html); 
                                            // $("tbody").html(html);
                  
                            }; 
            },
            error:function(XMLHttpRequest,textStatus,errorThrown){
                          // 请求失败后调用次函数
                          console.log("失败原因"+errorThrown);
            },
      });

  });

// function att(data){
//         for (var i =0; i<data.data.length;i++) {
//                            var $trs=$("<tr></tr>");
//                         for( j in data.data[i]){
//                             // var $tds =$("</td>");
//                             var $tds="<td>"+data.data[i][j]+"</td>";
//                                 $trs.append($tds);
//                       // $tds.html(data.data[i][j]);
//                       //       console.log($tds);

//                         }
//                         $("#studentlist").append($trs);
//                   // console.log(data.data[i]);
//       };
</script>