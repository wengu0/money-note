<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
   
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />  
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
<script src="js/mui.min.js"></script>
<link href="css/mui.min.css" rel="stylesheet"/>
</head>
<?php
@header("content-type:text/html;charset=utf8");
require_once('connt.php');
session_start();
//获取用户名和密码并验证
$username = $_POST['username'];
$password = $_POST['password'];

    
$sql="select id,username,password from user where username='$username' and password='$password';";
$result=mysqli_query($link,$sql);
$row=mysqli_num_rows($result);

if (!$result) {
    echo"<script>alert('登陆失败，用户名或密码错误');location='login.php'</script>";
}
if ($result->num_rows>0) {
    //将session赋值用户名
    $_SESSION['username'] = $username;
    $_SESSION['islogin'] = 1;
    header('Location:home.php');
} else {
    echo"<script>
    mui.alert('登录名或密码错误！',function () {
      window.location.href='login.php'});</script>";
}

?>
<body></body>
</html>
