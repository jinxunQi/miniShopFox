<?php
namespace app\admin\validate;
use think\Validate;

class AdValidate extends Validate
{
    protected $rule = [
        'title' => 'require',
        'img' => 'require',
        'gid' => 'require',
        'id' => 'require'
    ];

    protected $message = [
        'title.require' => '标题必填',
        'img.require' => '请上传图片',
        'gid.require' => '关联商品id必填',
        'id.require' => '广告id不能为空',
    ];

    protected $scene = [
        'add' => ['title','img','gid'],
        'edit' => ['title','img','gid','id']
    ];
}