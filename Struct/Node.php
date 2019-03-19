<?php
/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/17
 * Time: 下午4:31
 * 实现链表的node 节点
 */
class Node
{
    public $e; # node 节点的值
    public $next; # 链表的指向

    public function __construct($e = null, $next = null)
    {
        $this->e = $e;
        $this->next = $next;
    }
}