<?php
namespace app\admin\controller;
use app\admin\validate\AdValidate;
use think\Controller;
use think\Db;
use app\admin\model\Ad as AdModel;
use think\Exception;

class Ad extends Common
{
    /**
     * 广告首页
     * @param $id mixed 广告id
     * @param $tab mixed tab标识
     * @return mixed
     */
    public function index($id = 0, $tab = 1)
    {
        if (request()->isPost()) {
            //排序更新
            foreach (input('post.sort/a') as $key=>$value) {
                Db::table('fox_ad')->where('id',$key)->update(['sort'=>$value]);
            }
            return success('排序更新成功',url('index'));
        }

        $lists = (new AdModel())->lists();
        $this->assign('lists',$lists);

        //编辑广告 数据回显
        if($tab == 3){
            $info = Db::table('fox_ad')->where('id',$id)->find();
            if (!empty($info)) {
                $this->assign('info',$info);
            }
        }
        return $this->fetch();
    }


    /**
     * 保存添加广告数据
     */
    public function add()
    {
        if (request()->isPost()) {
            $params = input('post.');
            //验证器验证
            $validateModel = new AdValidate();
            $validateRes = $validateModel->scene('add')->check($params);
            if (true != $validateRes) {
                return error($validateModel->getError());
            }

            $result = (new AdModel())->addAd($params);
            if ($result) {
                return success('添加成功',url('index'));
            }
            return error('添加失败');

        }
    }


    /**
     * 保存编辑广告数据
     */
    public function edit()
    {
        if (request()->isPost()) {
            $params = input('post.');
            //验证器验证
            $validateModel = new AdValidate();
            $validateRes = $validateModel->scene('edit')->check($params);
            if (true != $validateRes) {
                return error($validateModel->getError());
            }

            $result = (new AdModel())->editAd($params);
            if (false !== $result['status']) {
                return success('编辑成功',url('index'));
            }else{
                return error('编辑失败');
            }
        }
    }

    /**
     * 删除广告数据
     */
    public function delete($id = 0)
    {
        if (request()->isPost()) {
            if (empty($id)) {
                return error('缺失id参数');
            }
            $ad = (new AdModel())->getAdById($id);
            if (!empty($ad)) {
                if (!empty($ad['img'])) {
                    //删除本地图片
                    $imgUrl = config('uploads_path').'/'.$ad['img'];
                    try {
                        unlink($imgUrl);
                    } catch (Exception $e) {
                        trace('删除本地图片失败-----'.$e->getMessage());
                    }
                }

                $res = AdModel::destroy($id);
                if ($res) {
                    return success('删除成功',url('index'));
                }
                return error('删除失败');
            }
        }
    }



}