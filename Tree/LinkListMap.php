<?php

/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/19
 * Time: 下午10:38
 * 基于链表实现map 字典
 */
class LinkListMap
{
    public $dummyHead; #虚拟的头节点
    public $size;

    public function __construct()
    {
        $this->dummyHead = new NodeMap();
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
     * 获取某个key
     */
    public function getNode($key)
    {
        $node = $this->dummyHead->next;
        while ($node != null) {
            if ($key == $node->key) {
                return $node;
            }
            $node = $node->next;
        }
        return null;
    }

    /**
     * 是否包含
     * @param $key
     * @return bool
     */
    public function contains($key)
    {
        return $this->getNode($key) !== null;
    }

    /**
     * 获取val
     * @param $key
     * @return null
     */
    public function getKey($key)
    {
        $node = $this->getNode($key);
        return $node->val ?? null;
    }

    /**
     * 添加新元素
     * @param $key
     * @param $val
     */
    public function add($key, $val)
    {
        $node = $this->getNode($key);

        if ($node == null) {
            $this->dummyHead->next = new NodeMap($key, $val, $this->dummyHead->next);
            $this->size ++;
        } else {
            $node->val = $val;
        }
    }

    /**
     * set 更新元素
     * @param $key
     * @param $val
     * @throws Exception
     */
    public function set($key, $val)
    {
        $node = $this->getNode($key);
        if ($node == null) {
            throw new \Exception('key不存在');
        }
        $node->val = $val;
    }

    /**
     * remove 删除
     * @param $key
     * @return null
     */
    public function remove($key)
    {
        $node = $this->dummyHead;
        while ($node != null) {
            if ($node->next->key == $key) {
                break;
            }
            $node = $node->next;
        }
        if ($node != null) {
            $val = $node->next;
            $node->next = $val->next;
            $val->next = null;
            return $val->val;
        }
        return null;
    }


    public function print()
    {
        print_r($this->dummyHead->next);
    }
}