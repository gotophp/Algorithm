<?php
/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/24
 * Time: 下午2:24
 * 并查集
 * 已数组形成树结构
 * 第三版
 * key -> value
 * 基于路径压缩
 * 所有的子节点
 */
class UnionFIndSix
{
    private $parent = [];
    private $rank;


    public function __construct($size)
    {
        //初始化执行对应id 没有关联
        for ($i = 0; $i < $size; $i++) {
            $this->parent[$i] = $i;
            $this->rank[$i] = 1;
        }
    }

    public function getSize()
    {
        return count($this->parent);
    }

    public function find($p)
    {
//        while ($p != $this->parent[$p]) {
//            $this->parent[$p] = $this->parent[$this->parent[$p]];
//            $p = $this->parent[$p];
//        }
        if ($p != $this->parent[$p]) {
            $this->parent[$p] = $this->find($p);
        }
        return $p;
    }

    public function isConnected($p, $q)
    {
        return $this->find($p) == $this->find($q);
    }

    public function unionElements($p, $q)
    {
        $p_root = $this->find($p);
        $q_root = $this->find($q);
        if ($p_root == $q_root) return;
        //把元素size 换到小的节点
        if ($this->rank[$p_root] < $this->rank[$q_root]) {
            $this->parent[$p_root] = $q_root;
        } else if ($this->rank[$p_root] > $this->rank[$q_root]) {
            $this->parent[$q_root] = $p_root;
        }
        else {
            $this->parent[$q_root] = $p_root;
            $this->rank[$p_root] = $this->rank[$p_root] + 1;
        }
    }

    public function print()
    {
        print_r($this->parent);
        print_r($this->rank);
    }
}