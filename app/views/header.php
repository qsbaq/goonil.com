<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?= Flight::get('flight.settings')['description'];?>">
    <meta name="keywords" content="<?= Flight::get('flight.settings')['keywords'];?>">
    <meta name="viewport" content="width=device-width">

    <title><?php if(!empty($the_title)){ echo $the_title."_";}?>GooNil.com</title>

    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">
    <!-- No Baidu Siteapp-->
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <meta name="msapplication-TileColor" content="#0e90d2">
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= Flight::get('flight.base_url');?>app/views/style.css">
    <link rel="shortcut icon" href="<?= Flight::get('flight.base_url');?>app/views/favicon.ico" />
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>

</head>
<body class="col-md-offset-2 col-md-8">

<div class="jads">
    <h1><a href="<?= Flight::get('flight.base_url');?>" title="<?= Flight::get('flight.settings')['description'];?>">GooNil.com</a></h1>
    <hr>
</div>


<!--正文开始-->