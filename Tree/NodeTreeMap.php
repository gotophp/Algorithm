<?php

/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/19
 * Time: 下午11:03
 */
class NodeTreeMap
{
    public $key;
    public $val;
    public $left;
    public $right;

    public function __construct($key = null, $val = null)
    {
        $this->key = $key;
        $this->val = $val;
        $this->left = null;
        $this->right = null;
    }
}