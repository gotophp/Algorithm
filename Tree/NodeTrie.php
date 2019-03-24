<?php

/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/24
 * Time: 上午11:26
 * 字典树的node节点
 */
class NodeTrie
{
    public $isword;
    public $next;

    public function __construct($isword = false)
    {
        $this->isword = $isword;
        $this->next = [];
    }


}