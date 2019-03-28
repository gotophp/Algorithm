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
 * 数组区间的和
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
     *
     * 递归构建创建线段树
     * @param $index
     * @param $l
     * @param $r
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
        $this->tree[$index] = $this->tree[$left] + $this->tree[$right];
    }

    /**
     * 返回存储区间
     * @param $query_l
     * @param $query_r
     */
    public function query($query_l, $query_r)
    {
        if ($query_l < 0 || $query_l >= $this->getSize() || $query_r < 0
            || $query_r >= $this->getSize() || $query_r < $query_l) {
            throw new \Exception('越界');
        }
        return $this->buildQuery(0, 0, $this->getSize() - 1, $query_l, $query_r);
    }

    /**
     * 构造查询
     * @param $index 当前索引
     * @param $l    左
     * @param $r    右
     * @param $query_l 查询的左
     * @param $query_r 查询的右
     */
    public function buildQuery($index, $l, $r, $query_l, $query_r)
    {
        if ($l == $query_l && $r == $query_r) {
            return $this->tree[$index];
        }
        $left = $this->leftChild($index); # 3
        $right = $this->rightChild($index); # 4
        $mid = (int)(($l + $r) / 2); #0
        if ($query_l >= $mid + 1) {
           return $this->buildQuery($right, $mid + 1, $r, $query_l, $query_r);
        } else if($query_r <= $mid) {
           return $this->buildQuery($left, $l, $mid, $query_l, $query_r);

        }
        $result_l = $this->buildQuery($left, $l, $mid, $query_l, $mid);
        $result_r = $this->buildQuery($right, $mid + 1, $r, $mid + 1, $right);
        return $result_l + $result_r;
    }

    public function update($index, $val)
    {
        $this->data[$index] = $val;
        $this->buildUpdate(0, 0, $this->getSize() - 1, $index, $val);
    }

    private function buildUpdate($tree_index, $l, $r, $index, $e)
    {
        if ($l == $r) {
            $this->tree[$tree_index] = $e;
            return;
        }
        $mid = (int)(($l + $r) / 2); #0
        $left = $this->leftChild($index); # 3
        $right = $this->rightChild($index); # 4
        if ($index >= $mid + 1) {
            $this->buildUpdate($right, $mid + 1, $r, $index, $e);
        } else {
            $this->buildUpdate($left, $l, $mid, $index, $e);
        }
        $this->tree[$tree_index] = $this->tree[$left] + $this->tree[$right];
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
        #ksort($this->tree);
        print_r($this->tree);
    }

}