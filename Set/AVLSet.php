<?php

/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/25
 * Time: 下午11:55
 */
class AVLSet
{
    private $avl;

    public function __construct()
    {
        $this->avl = new AVLlBSTTree();
    }


    public function getSize()
    {
        return $this->avl->getSize();
    }

    public function isEmpty()
    {
        return $this->avl->isEmpty();
    }

    public function add($e)
    {
        $this->avl->add($e, null);
    }

    public function contains($e)
    {
        return $this->avl->contains($e);
    }

    public function remove($e)
    {
        return $this->avl->remove($e);
    }

    public function print()
    {
        return $this->avl->print();
    }
}