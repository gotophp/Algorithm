<?php
/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/17
 * Time: 下午4:36
 * 实现链表
 * 1.虚拟头结点的牛逼之处
 */

Class LinkList
{
    private $dummy_head; #链表头结点 虚拟头节点
    private $size; #链表的size

    /**
     * 构造函数
     * LinkList constructor.
     */
    public function __construct()
    {
        $this->dummy_head = new NodeTree();
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
     * 在链表的头部增加头节点
     * 可能头节点是空 可能已经存在
     *
     * @param $e
     */
    public function addFirst($e)
    {
        # 构造的时候 已经赋值
        $this->add(0, $e);
    }

    /***
     *在链表某个位置添加节点
     */
    public function add($index, $e)
    {
        if ($index < 0 || $index > $this->size) {
            throw new \Exception(__FUNCTION__ . '节点index脱离链表');
        }
        $prev = $this->dummy_head;
        # 拿到当前index 的前一个元素
        for ($i = 0; $i < $index; $i++) {
            $prev = $prev->next;
        }
        # 增加链表
        $prev->next = new NodeTree($e, $prev->next);
        $this->size++;
    }

    /**
     * 链表的尾部增加节点
     * @param $e
     */
    public function addLast($e)
    {
        $this->add($this->size, $e);
    }

    /**
     * 获取链表的索引元素
     * @param $index
     * @return mixed
     * @throws Exception
     */
    public function get($index)
    {
        if ($index < 0 || $index >= $this->size) {
            throw new \Exception(__FUNCTION__ . '节点index脱离链表');
        }
        $prev = $this->dummy_head->next;
        # 拿到当前index 的前一个元素
        for ($i = 0; $i < $index; $i++) {
            $prev = $prev->next;
        }
        return $prev->e;
    }

    /**
     * 获取链表的第一个
     */
    public function getFirst()
    {
        return $this->get(0);
    }

    /**
     * 获取链表的最后一个
     * 索引从0开始
     */
    public function getLast()
    {
        return $this->get($this->size - 1);
    }

    /**
     * set更新链表值
     */
    public function set($index, $e)
    {
        if ($index < 0 || $index >= $this->size) {
            throw new \Exception(__FUNCTION__ . '节点index脱离链表');
        }
        $prev = $this->dummy_head->next;
        # 拿到当前index 的前一个元素
        for ($i = 0; $i < $index; $i++) {
            $prev = $prev->next;
        }
        $prev->e = $e;
    }

    /**
     * 是否包含值
     */
    public function contains($e)
    {
        $prev = $this->dummy_head->next;
        while ($prev != null) {
            if ($prev->e == $e) {
                return true;
            }
        }
        return false;
    }

    /**
     * 链表删除元素
     */
    public function remove($index)
    {
        if ($index < 0 || $index >= $this->size) {
            throw new \Exception(__FUNCTION__ . '节点index脱离链表');
        }
        $prev = $this->dummy_head;
        # 拿到当前index 的前一个元素
        for ($i = 0; $i < $index; $i++) {
            $prev = $prev->next;
        }
        $re = $prev->next;
        $prev->next = $re->next;
        $re->next = null;
        return $re->e;
    }

    /**
     * 删除链表的首元素
     */
    public function removeFrist()
    {
        $this->remove(0);
    }

    /**
     * remove元素的最后一个元素
     */
    public function removeLast()
    {
        $this->remove($this->size - 1);
    }

    public function print()
    {
        print_r($this->dummy_head);
    }
}