<?php
namespace app\admin\model;
use think\Model;

class Ad extends Model
{
    //广告列表
    public function lists()
    {
        $fr = $this->order('sort desc')->select();
        if (0 != count($fr)) {
            return $fr->toArray();
        }
        return [];
    }

    //保存添加广告数据
    public function addAd($params)
    {
        return $this->allowField(true)->save($params);
    }

    //保存编辑广告数据
    public function editAd($params)
    {
        $fr = $this->where('id',$params['id'])->find();
        if (empty($fr)) {
            return ['status'=>false,'msg'=>'数据不存在'];
        }
        $data = [
            'type' => $params['type'],
            'title' => $params['title'],
            'img' => $params['img'],
            'gid' => $params['gid'],
            'sort' => $params['sort']
        ];
        $this->where('id',$params['id'])->update($data);
        return ['status'=>true,'msg'=>'更新成功'];
    }

    //通过id获取详细的广告数据
    public function getAdById($id)
    {
        return $this->where('id',$id)->find();
    }

}