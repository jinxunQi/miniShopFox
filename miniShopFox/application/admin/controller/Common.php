<?php
namespace app\admin\controller;
use think\Controller;

class Common extends Controller
{
    //初始化方法
    public function _initialize()
    {
        //检测用户登录,是否存在session
//        if (null == session('user.name')||session('user.name') !='admin') {
//            $this->redirect('login/index');
//        }
    }

    /**
     * 公共图片上传 （单图片或文件异步上传）
     */
    public function upload_image()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
        header('Access-Control-Allow-Headers:x-requested-with,content-type');
//        $file = request()->file('name');
        $file = request()->file('file');
        if ($file) {
            $uploadPath = config('uploads_path');
            $info = $file->move($uploadPath);
            if ($info) {
                $fileName = str_replace('\\','/',$info->getSaveName());
                return json_encode(['filename'=>$fileName]);//返回文件名
            }
        }
    }


}