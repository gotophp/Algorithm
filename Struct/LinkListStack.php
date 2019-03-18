<?php
/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/17
 * Time: 下午10:36
 * 基本链表实现的栈
 */
class LinkListStack
{
    private $list; # 列表

    public function __construct()
    {
        $this->list = new LinkList();
    }

    public function getSize()
    {
        return $this->list->getSize();
    }

    public function isEmpty()
    {
        return $this->list->isEmpty();
    }

    /**
     * push 最后一个始终在栈顶
     * @param $e
     */
    public function push($e)
    {
        $this->list->addFirst($e);
    }

    /**
     * pop 栈顶元素
     */
    public function pop()
    {
        return $this->list->removeFrist();
    }

    /**
     * peek 查看栈顶元素
     */
    public function peek()
    {
        return $this->list->getFirst();
    }

    public function print()
    {
        $this->list->print();
    }
}