<?php

/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/18
 * Time: 下午9:46
 */
class NodeRBTree
{
    const RED = true;
    const BLACK = false;
    public $e;
    public $left;
    public $right;
    public $color; #

    public function __construct($e)
    {
        $this->e = $e;
        $this->left = null;
        $this->right = null;
        $this->color = static::RED;
    }
}