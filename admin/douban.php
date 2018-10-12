<?php 
require_once'../functions.php';

xiu_get_current_user();

 ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>douban &laquo; Admin</title>
  <link rel="stylesheet" href="/baixiu-dev/static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/baixiu-dev/static/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/baixiu-dev/static/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/baixiu-dev/static/assets/css/admin.css">
  <script src="/baixiu-dev/static/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <?php include 'inc/navbar.php'; ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>最新电影榜单</h1>
      </div>
      <ul id="movies"></ul> 
    </div>
  </div>
  
  <?php $current_page = 'douban'; ?>
  <?php include 'inc/sidebar.php'; ?>

  <script src="/baixiu-dev/static/assets/vendors/jquery/jquery.js"></script>
  <script src="/baixiu-dev/static/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <!-- <script>
    //XMLHttpRequest不能发送对不同元地址的请求
    /*$.get('http://api.douban.com/v2/movie/in_theaters', {}, function(res){
      console.log(res)
    })*/
    function foo(res){
      console.log(res)
    }
  </script>
  script标签可以对不同源地址请求
  <script src="http://api.douban.com/v2/movie/in_theaters?callback=foo"></script> -->
  <script>
    
    $.ajax({
      url:'http://api.douban.com/v2/movie/in_theaters',
      dataType:'jsonp',
      success:function(res){
        $(res.subjects).each(function(i,item){
          $('#movies').append(`<li>${item.title}</li>`)
        })
      }
    })  

  </script>

  <script>NProgress.done()</script>
</body>
</html>