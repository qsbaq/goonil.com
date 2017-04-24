<?php

return [
    'debug'    => true,
    'base_url' => 'YourSiteUrl',
    'db' => [
        'database_type' => 'mysql',
        'database_name' => 'name',
        'server'        => 'localhost',
        'username'      => 'your_username',
        'password'      => 'your_password',
        'charset'       => 'utf8',
        'port'          => 3306,
        'option'        => [
            PDO::ATTR_CASE => PDO::CASE_NATURAL,
        ],
    ],
    'spider_agent' => [
        'baidu'     =>  'Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)',
        '360'       =>  'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0); 360Spider',
        'sougou'    =>  'Sogou web spider/4.0(+http://www.sogou.com/docs/help/webmasters.htm#07)',
        'google'    =>  'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)',
        'bing'      =>  'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)',
        'youdao'    =>  'Mozilla/5.0 (compatible; YodaoBot/1.0; http://www.yodao.com/help/webmaster/spider/)'
    ],
    'settings' => [
        'keywords'       =>'随机密码,MD5加密,sha1加密,搜索引擎快照',
        'description'   =>'一个可以生产随机密码，MD5加密，SHA1加密，搜索引擎快照检测的网站。',
        'external_js'   => 'app/views/extrenal.js',
        'ads_top'       => null,
        'ads_bottom'    =>'<img src="https://www.jiloc.com/wp-content/uploads/weixin.gif" style="max-width:600px;">',
    ],
];