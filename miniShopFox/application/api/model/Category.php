<?php
namespace app\api\model;
use think\Model;

class Category extends Model
{

    /**
     * 获取首页分类
     * @param string $sort 排序
     * @return mixed
     */
    public function getIndexCategory($sort = 'desc')
    {
        return $this->where('is_show_index',1)
            ->order("sort {$sort}")
            ->select();
    }
}