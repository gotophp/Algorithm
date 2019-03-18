<?php

/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/18
 * Time: 下午9:46
 */
class NodeTree
{
    public $e;
    public $left;
    public $right;

    public function __construct($e)
    {
        $this->e = $e;
        $this->left = null;
        $this->right = null;
    }
}