<?php
namespace app\api\controller;

use app\api\model\Ad;
use app\api\model\Category;
use think\Db;

class Index extends Common
{

    //获取小程序首页公共数据
    public function index(Ad $adModel,
                          Category $category)
    {
        //幻灯片（不涉及token验证,可对外开放）
        $banner = $adModel->lists(0,6);

        //获取广告
        $ad = $adModel->lists(1,4);

        //获取首页分类
        $categories = $category->getIndexCategory();
        foreach ($categories as $key => $value) {
            //获取当前主分类下最新四条商品信息
            $goods = Db::table('fox_goods')
                ->where('cid_one',$value['id'])
                ->limit(4)
                ->order('id desc')
                ->select();
            $categories[$key]['list'] = $goods;
        }

        return json([
            'code' => 200,
            'msg' => '首页数据获取成功',
            'banner' => $banner,
            'ad' => $ad,
            'goods' => $categories
        ]);
    }
}