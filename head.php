<?php
session_start();
if (empty($_SESSION["usname"])) {
	unset($_SESSION['usname']);
	// header("Refresh:0;url=logon.php");	
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" type="text/css" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<style>
		.content .mublue{
			background-color: blue;
		}
		.box{
			margin:35px auto;
		}
		.box ul li a{
			color:#1299ec;
		}
		.sui_contaName{
			position:relative;
			width:1000px;
			height:450px;
			border-top-left-radius:10px;
			border-top-right-radius: 10px;
			background-color:#e4e4e4;
			margin:50px auto;
		}
		/*左边的开始*/
		.sidebar_left{
			width:300px;
			height:350px;
			border-right:1px solid #eeeeee;
			/*border-right:#e4e4e4;*/
		}
		/*左边的结束*/
		/*课程开始*/
		.sui_ck{
			width:500px;
			height:33px;
			text-align:center;
		}
		.sui_box{
			width:1000px;
			height:40px;
			margin:0 auto;
			border-top-left-radius:10px;
			border-top-right-radius: 10px;
			text-align:center;
			font-size:25px;
			color:#e4e4e4;
			background-color:#119ff6;
			line-height:40px;
		}
		.userinfo{
			position: absolute;
			width: 200px;
			height: 25px;
			line-height: 25px;
			top:10px;
			right: 0;
			font-size: 12px;
		}
		.userinfo span{
			color: red;
		}
		/*.nume_Button{
			/*position:absolute;*/
			/*height:80px;
			width:1000px;
			margin:0 auto;*/
			/*top:55%;
			left:50%;
			margin-left:-500px;*/
			/*background-color:red;	*/
		
		#nav{
			width: 50%;
			text-align: center;
			position: absolute;
			bottom: 10px;
			left: 25%;
		}
		#nav button,#nav span{
			border: 0;
			outline: none;
			font-size: 15px;
			cursor: pointer;
			padding: 5px 10px;
			border-radius: 5px;
			font-family: kaiti;
			list-style-type: none;
			display: inline-block;
			background-color: #eee;
		}
		#nav button.on{
			color: #0bf;
			background-color: #ff0;
		}
		#nav button.ect,#nav span{
			background-color: transparent;
		}
		#nav input{
			width: 60px;
			height: 20px;
			outline: none;
			text-align: center;
			border-radius: 5px;
		}
</style>
</head>
<body>
<div class="sui-container sui_contaName">
<div class="sui-layout">
<div class="sui_box">欢迎使用学生管理系统
<div class="userinfo">欢迎<span><?php echo empty($_SESSION["usname"])? "登录":$_SESSION["usname"]; ?></span>登录&nbsp;&nbsp;<a href="login_out.php">退出</a></div>
</div>
