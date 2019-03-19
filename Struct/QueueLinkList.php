<?php
/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/17
 * Time: 下午4:36
 * 队列
 * 基于链表实现
 */

Class QueueLinkList
{
    private $head; #头节点
    private $tail; #尾节点
    private $size; #大小

    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
        $this->size = 0;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function isEmpty()
    {
        return $this->size == 0;
    }

    /**
     * 入队
     * @param $e
     */
    public function enqueue($e)
    {
        if ($this->tail == null) {
            $this->head = $this->tail = new NodeTree($e);
        } else {
            $this->tail = $this->tail->next = new NodeTree($e, $this->tail->next);
        }
        $this->size ++;
    }

    /**
     * 出队
     */
    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new \Exception('no result');
        }
        $re = $this->head;
        $this->head = $this->head->next;
        $re->next = null;
        $this->size --;
        #头为空 尾部应该也是为空
        if ($this->head == null) {
            $this->tail = null;
        }
        return $re->e;
    }


    /**
     * 获取队列的头节点
     */
    public function getFront()
    {
        if ($this->isEmpty()) {
            throw new \Exception('no result');
        }
        return $this->head->e;
    }

    public function print()
    {
        print_r($this->head);
    }
}