<?php
/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/24
 * Time: 下午2:24
 * 并查集
 * 已数组形成树结构
 * 第二版
 * key -> value
 */
class UnionFIndTwo
{
    private $parent = [];


    public function __construct($size)
    {
        //初始化执行对应id 没有关联
        for ($i = 0; $i < $size; $i++) {
            $this->parent[$i] = $i;
        }
    }

    public function getSize()
    {
        return count($this->parent);
    }

    public function find($p)
    {
        while ($p != $this->parent[$p]) {
            $p = $this->parent[$p];
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

        $this->parent[$p_root] = $q_root;
    }

    public function print()
    {
        print_r($this->parent);
    }
}