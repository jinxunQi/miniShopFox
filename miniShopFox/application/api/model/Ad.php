<?php
namespace app\api\model;
use think\Model;

class Ad extends Model
{
    /**
     * 获取广告|幻灯片列表数据
     * @param int $type 类型 0：幻灯片  1：广告
     * @param int $limit 获取记录条数
     * @param string $sort 排序，默认降序
     * @return mixed
     */
    public function lists($type = 0, $limit = 5, $sort = 'desc')
    {
        return $this->where('type',$type)
            ->limit($limit)
            ->order("sort {$sort}")
            ->select();
    }
}