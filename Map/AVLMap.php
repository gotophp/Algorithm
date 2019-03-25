<?php

/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/25
 * Time: 下午11:37
 */
class AVLMap
{
    public $avl;

    public function __construct()
    {
        $this->avl = new AVLlBSTTree();
    }

    public function add($k, $v)
    {
        $this->avl->add($k, $v);
    }

    public function remove($k)
    {
        $this->avl->remove($k);
    }

    public function get($k)
    {
        return $this->avl->getKey($k);
    }

    public function getSize()
    {
        return $this->avl->getSize();
    }

    public function isEmpty()
    {
        return $this->avl->isEmpty();
    }

    public function print()
    {
        return $this->avl->print();
    }
}