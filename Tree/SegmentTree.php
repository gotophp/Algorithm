<?php

/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/21
 * Time: 下午10:09
 * 线段树
 * 是不完全二叉树
 * 但是 下面数组实现
 * 当做一个满二叉树
 * 满二叉树肯定是平衡二叉树
 * 那就是完全二叉树
 *
 */
class SegmentTree
{
    private $data;
    private $tree; #存储线段树

    public function __construct($arr = [])
    {
        $length = count($arr);
        $this->data = new ArrayData($length);
        $this->data->newArr($arr);
        # 为什么是4 请看4N推导式
        $this->tree = [];
//        echo $this->tree->getLength();
        $this->buildTree(0, 0, $this->getSize() - 1);
    }

    /**
     * 创建区间树
     */
    private function buildTree($index, $l, $r)
    {
        if ($l == $r) {
            $this->tree[$index] = $this->data->get($l);
            return;
        }
        $left = $this->leftChild($index);
        $right = $this->rightChild($index);

        $mid = (int)(($l + $r) / 2);
        $this->buildTree($left, $l, $mid);
        $this->buildTree($right, $mid + 1, $r);
        $this->tree[$index] = [$this->tree[$left], $this->tree[$right]];
       # $this->tree[$index] = [$this->data->get($left), $this->data->get($right)];
    }
    public function getSize()
    {
       return $this->data->getSize();
    }

    public function get($index)
    {
        if ($index < 0 || $index >= $this->getSize()) {
            throw new \Exception('越界');
        }
        return $this->data[$index];
    }

    /**
     * 完全二叉树都可以用于这个
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

    public function print()
    {
        print_r($this->tree);
    }

}