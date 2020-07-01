<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;

class Ad extends Controller
{
    /**
     * 广告首页
     */
    public function index($id = 0, $tab = 1)
    {
        if (request()->isPost()) {
            //排序更新
            foreach (input('post.sort/a') as $key=>$value) {
                Db::table('fox_ad')->where('id',$key)->update(['sort'=>$value]);
            }
            return $this->success('排序更新成功',url('index'));
        }


        $lists = Db::table('fox_ad')
            ->order('sort desc')
            ->select();

        $this->assign('lists',$lists);


        //编辑广告
        if($tab == 3){
            $info = Db::table('fox_ad')->where('id',$id)->find();
            if (!empty($info)) {
                $this->assign('info',$info);
            }
        }
        return $this->fetch();
    }
}