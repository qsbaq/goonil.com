<?php
// curl 伪造agent抓取页面
function http_get($URL,$key='baidu') { 
    $agent = Flight::get('flight.spider_agent')[$key];
    if( !$agent ){
        return false;
    }
    $c = curl_init(); 
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    //curl_setopt($c, CURLOPT_HEADER, 1);//输出远程服务器的header信息
    curl_setopt($c, CURLOPT_USERAGENT, $agent);
    curl_setopt($c, CURLOPT_HTTPHEADER,array('Accept-Encoding: gzip, deflate'));
    curl_setopt($c, CURLOPT_ENCODING, 'gzip,deflate');//这个是解释gzip内容.................
    curl_setopt($c, CURLOPT_URL, $URL); 
    curl_setopt($c, CURLOPT_TIMEOUT,2);
    $contents = curl_exec($c); 
    $contents = mb_convert_encoding($contents, 'utf-8', 'GBK,UTF-8,ASCII');
    $httpCode = curl_getinfo($c,CURLINFO_HTTP_CODE); 
    curl_close($c);
    return ['data'=>$contents,'http_code'=>$httpCode];
}



function generate_password( $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_ []{}<>~`+=,.;:/?|',$length = 16 ) {
    // 密码字符集，可任意添加你需要的字符
    $password = '';
    for ( $i = 0; $i < $length; $i++ ) {
            // 这里提供两种字符获取方式
            // 第一种是使用 substr 截取$chars中的任意一位字符；
            // 第二种是取字符数组 $chars 的任意元素
            // $password .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
            $password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
    }

    return $password;
}