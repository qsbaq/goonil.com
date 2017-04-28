<?php

Flight::route('/', function () {
    Flight::etag('index');
    Flight::render('header',['the_title'=>'随机密码生成,MD5加密,搜索引擎快照'],'header_content');
    Flight::render('footer',['tabId'=>'random'],'footer_content');
    Flight::render('index',['md5_content'=>'','url'=>'','agent'=>'','snapshot_content'=>'','word'=>'','getrandom'=>'','length'=>16,'type'=>'AZ-az-09']);
});

Flight::route('/random', function () {
    Flight::etag('random');
    if( @$_POST['type'] ) {
        $type = $_POST['type'];
        $length = (int)$_POST['length'] > 96 ? 96 : (int)$_POST['length'];
        $char = '';
        $Otype = '';
        if (is_array( $type) ){
            if( in_array('AZ',$type) ){
                $char .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $Otype = 'AZ-';
            }
            if( in_array('09',$type) ){
                $char .= '0123456789';
                $Otype .= '09-';
            }
            if( in_array('az',$type)){
                $char .= 'abcdefghijklmnopqrstuvwxyz';
                $Otype .= 'az-';
            }
            if( in_array('other',$type) ){
                $char .= '!@#$%^&*()-_[]{}<>~`+=,.;:/?|';
                $Otype .= 'other';
            }
        }
    }else{
        $Otype = 'AZ-az-09-other';
        $length = 16;
        $char = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_ []{}<>~`+=,.;:/?|';
    }

    $words = generate_password( $char ,$length );

    $passwd = Flight::get('db')->select('passwd', ['words'], [
                'words' => $words,
            ]);    
    if(! $passwd ){
        Flight::get('db')->insert('passwd', [
            'word'      => $words,
            'md5'       => md5($words),
            'sha1'      => sha1($words),
        ]);
    }
    Flight::render('header',['the_title'=>'随机密码生成器'],'header_content');
    Flight::render('footer',['tabId'=>'random'],'footer_content');
    Flight::render('index',['md5_content'=>'','url'=>'','agent'=>'','word'=>'','snapshot_content'=>'',
        'getrandom'=>'<input type="text" class="form-control " value="'.$words.'">',
        'length'=>$length,'type'=>rtrim($Otype,'-')]);
});

flight::route('/passwd',function(){
    Flight::etag('passwd-none');
    Flight::notFound('Please input the words.');        
});

Flight::route('/passwd/@word', function ($words) {
    Flight::etag('passwd');
    $passwd = Flight::get('db')->select('passwd', ['words','md5'], [
                'words' => $words,
            ]);
    $md5 = md5($words);
    $sha1 = sha1($words);
    if(! $passwd ){
        Flight::get('db')->insert('passwd', [
            'word'      => $words,
            'md5'       => $md5,
            'sha1'      => $sha1,
        ]);
    }
    Flight::render('header',['the_title'=>$words.'_MD5加密'],'header_content');
    Flight::render('passwd',['word'=>$words,'md5'=>$md5,'md516'=>substr($md5,8,16),'sha1'=>$sha1],'md5_content');
    Flight::render('footer',['tabId'=>'passwd'],'footer_content');
    Flight::render('index',['snapshot_content'=>'','agent'=>'','length'=>'','getrandom'=>'','type'=>'','url'=>'']);
});


Flight::route('/snapshot', function () {
    Flight::etag('snapshot');
    $url = Flight::request()->query['url'];
    $agent = Flight::request()->query['agent'];
    if ( !$url || !$agent ){
        Flight::notFound('Missing parameter.缺失参数.');
    }
    $output = http_get($url,$agent);
    if( $output['http_code'] != 200 ){
        Flight::notFound('The URL returns the HTTP status code -> '.$output['http_code'].' .该网址返回HTTP状态代码 -> '.$output['http_code'].'.');
    }
    Flight::render('header',['the_title'=>$url.'-'.$agent.'搜索引擎快照'],'header_content');
    Flight::render('snapshot',['snapshot'=>$output['data']],'snapshot_content');
    Flight::render('footer',['tabId'=>'snapshot'],'footer_content');
    Flight::render('index',['md5_content'=>'','word'=>'','agent'=>$agent,'getrandom'=>'','length'=>16,'type'=>'AZ-az-09','url'=>$url]);
    
});

Flight::map('notFound', function ($message) {
    Flight::response()->status(200)
        ->header('content-type', 'text/html; charset=utf-8')
        ->write(
            '<h1>Error! 异常！</h1>'.
            "<h3>{$message}</h3>".
            '<p><a href="'.Flight::get('flight.base_url').'">Return HOME.回到首页</a></p>'.
            str_repeat(' ', 512)
        )
        ->send();
});

Flight::map('error', function (Exception $ex) {
    $message = Flight::get('flight.log_errors') ? $ex->getTraceAsString() : 'Error 出错了';
    Flight::response()->status(404)
        ->header('content-type', 'text/html; charset=utf-8')
        ->write(
            '<h1>404 Error.Page Not Found.</h1>'.
            "<h3>{$message}</h3>".
            '<p><a href="'.Flight::get('flight.base_url').'">Return HOME.回到首页</a></p>'.
            str_repeat(' ', 512)
        )
        ->send();
});


/*
 * Registers a class and set a variable to framework method.
 *
 * @param string $name Method name
 * @param string $class Class name
 * @param array $params Class initialization parameters
 * @param callback $callback Function to call after object instantiation
 * @throws \Exception If trying to map over a framework method
 */
Flight::map('instance', function ($name, $class, array $params = [], $callback = null) {
    Flight::register($name, $class, $params, $callback);
    Flight::set($name, Flight::{$name}());
});
