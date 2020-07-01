<?php
namespace app\admin\controller;
use think\Controller;

class Common extends Controller
{
    //初始化方法
    public function _initialize()
    {
        //检测用户登录,是否存在session
        if (null == session('user.name')||session('user.name') !='admin') {
            $this->redirect('login/index');
        }
    }

}