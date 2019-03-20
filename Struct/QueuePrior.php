<?php

/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/21
 * Time: 上午12:55
 * 基于最大堆
 * 实现的优先队列
 */
class QueuePrior
{
    private $prior;


    public function __construct()
    {
        $this->prior = new MaxHeap();
    }

    public function getSize()
    {
        return $this->prior->getSize();
    }

    public function isEmpty()
    {
        return $this->prior->isEmpty();
    }

    public function getFront()
    {
        return $this->prior->findMax();
    }

    public function enqueue($e)
    {
        $this->prior->add($e);
    }

    public function dequeue()
    {
        $this->prior->extractMax();
    }
}