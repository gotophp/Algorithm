<?php

/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/19
 * Time: 下午10:21
 * Set 集合
 * 基于二分搜索树实现集合
 */
class TreeSet
{
    private $set;

    public function __construct()
    {
        $this->set = new BST();
    }

    public function getSize()
    {
        return $this->set->getSize();
    }

    public function isEmpty()
    {
        return $this->set->isEmpty();
    }

    public function add($e)
    {
        $this->set->add($e);
    }

    public function contains($e)
    {
        return $this->set->contains($e);
    }

    public function remove($e)
    {
        return $this->set->remove($e);
    }

    public function print()
    {
        $this->set->print();
    }
}