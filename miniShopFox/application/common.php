<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

error_reporting(E_ALL ^ E_NOTICE);//错误级别

use think\Db;

//成功后的返回的json
function success($msg = '成功', $url = ''){
    $data['status'] = 200;
    $data['msg'] = $msg;
    $data['url'] = $url;
    return json($data);
}
//失败后的返回的json
function error($msg = '失败', $url = ''){
    $data['status'] = 202;
    $data['msg'] = $msg;
    $data['url'] = $url;
    return json($data);
}