<?php
namespace app\admin\controller;
use think\Controller;

class Upload extends Common
{
    /**
     * 公共图片上传 （单图片或文件异步上传）
     */
    public function upload_image()
    {
        $file = request()->file('name');
        if ($file) {
            $uploadPath = config('uploads_path');
            $info = $file->move($uploadPath);
            if ($info) {
                $fileName = str_replace('\\','/',$info->getSaveName());
                return json_encode($fileName);//返回文件名
            }
        }
    }
}