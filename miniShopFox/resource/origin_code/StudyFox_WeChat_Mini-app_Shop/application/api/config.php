<?php
//配置文件
return [
    'wxpay' => [
        'appid' => "wx6965274ac4773fbe", //小程序应用id
        'secret' => "535f16b6a008d6d7343b620e3c31296b", //小程序secret
        'mch_id' => '', //商户ID
        'api_key' => '', //商户平台自己设定的32位API密钥
        'notify_url' => 'https://dev.blogad.top/index.php/api/Pay/notify', //回调地址
        // 'domain' => 'https://dev.blogad.top'
        'domain' => 'http://mini-app.studyfox.cn'
    ],
];
