<?php

/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/19
 * Time: 下午10:39
 */
class NodeAVL
{
    public $key;
    public $val;
    public $left;
    public $right;
    public $height;

    public function __construct($key = null, $val = null)
    {
        $this->key = $key;
        $this->val = $val;
        $this->left = null;
        $this->right = null;
        $this->height = 1;
    }
}