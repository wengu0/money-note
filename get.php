<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />  
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
 
    <script src="js/mui.min.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <script type="text/javascript" charset="utf-8"> </script>
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <body>
<?php
//调用文件连接数据库
require_once('connt.php');
//POST获取值并赋值
$title = $_POST['title'];
$amount = $_POST['amount'];
$remark = $_POST['remark'];
$time = date('Y-m-d');
session_start();
//拿到title的id
$id =$link->query("select id from category where title='{$title}'");
foreach ($id as $key => $value) {
    foreach ($value as $k => $v) {
      $arr[$k] = $v;
    }
$cid=$arr['id'];
}
//拿到用户的id
$id2 =$link->query("select id from user where username='{$_SESSION['username']}'");
foreach ($id2 as $key => $value) {
    foreach ($value as $k => $v) {
      $arr[$k] = $v;
    }
$aid=$arr['id'];
}
if (!filled_out($_POST)) {
    echo "<script>mui.plusReady(function(){  
      mui.alert('没有填写完整',function () {
        window.location.href='newbooking.php'});
         });</script>";
  }
else {
    //写入明细
    $result = $link->query("insert into booking values('','".$aid."','".$cid."', '1','".$amount."', '".$time."','".$remark."')");
    header('location:index.php');
    if(!$result){
        echo '写入有误';
    }
}
?>
</body>