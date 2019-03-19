<?php

/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/19
 * Time: 下午11:41
 * 二叉堆基于数组的实现
 * 最大堆
 * 1.二叉堆是一棵完全二叉树
 * 2.堆的某个节点不大于父节点的值， 相反子节点可以等于父节点但是
 * 3.最大堆 （最小堆是相反的）
 * 4.基于数组实现最大堆
 * # parent 是子节点的 i / 2 整数相除
 * # left 子节点 与父节点关系  i * 2
 * # right 子节点   与父节点关系  i * 2 + 1
 */
class MaxHeap
{
    private $array;

    public function __construct()
    {
        $this->array = new ArrayData();
    }

    /**
     * 返回值
     * @return int
     */
    public function getSize()
    {
        return $this->array->getSize();
    }

    /**
     * 返回堆是否为空
     */
    public function isEmpty()
    {
        return $this->array->isEmpty();
    }

    /**
     * 返回 parent 节点
     * @param int $index
     * @return int
     * @throws Exception
     */
    public function parent(int $index)
    {
        if ($index <= 0) {
            throw new \Exception($index . '没有对应父亲元素');
        }

        return (int) (($index - 1) / 2);
    }

    /**
     * 左子树位置
     * @param $index
     * @return mixed
     */
    private function leftChild($index)
    {
        return $index * 2 + 1;
    }

    /**
     * 右子树位置
     * @param $index
     * @return mixed
     */
    private function rightChild($index)
    {
        return $index * 2 + 2;
    }

    /**
     * 添加元素
     * @param $e
     */
    public function add($e)
    {
        $this->array->addLast($e);
        # 开始上浮
        $this->siftUp($this->getSize() - 1);
    }


    /**
     * 上浮
     */
    private function siftUp($index)
    {
        # 判断index不等于 0  切当前index元素大于 父级元素 继续上浮
        while ($index > 0 && $this->data[$this->parent($index) < $this->data[$index]]) {
            $temp_index = $this->parent($index);
            $this->array->swap($temp_index, $index);
            $index = $temp_index;
        }
    }

    public function print()
    {
        $this->array->print();
    }


    public function __get($name)
    {
        if ($name == 'data') {
            return $this->array->getArray();
        }
    }
}