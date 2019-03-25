<?php

/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/19
 * Time: 下午10:39
 */
class NodeMap
{
    public $key;
    public $val;
    public $next;

    public function __construct($key = null, $val = null, $next = null)
    {
        $this->key = $key;
        $this->val = $val;
        $this->next = $next;
    }

}