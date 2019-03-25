<?php

/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/24
 * Time: 下午2:03
 * 并查集
 * 基于数组实现的并查集
 */
class UnionFind
{
    private $id;

    public function __construct($size)
    {
        $this->id = [];

        for ($i = 0; $i < $size; $i++) {
            $this->id[$i] = $i;
        }
    }

    public function getSize()
    {
        return count($this->id);
    }

    public function find($p)
    {
        return $this->id[$p];
    }

    /**
     * 查询两个id 是否一致
     * @param $p
     * @param $q
     * @return bool
     */
    public function isConnected($p, $q)
    {
        return $this->find($p) == $this->find($q);
    }

    /**
     * 合并并查集
     * @param $p
     * @param $q
     */
    public function unionElements($p, $q)
    {
        $p_id = $this->find($p);
        $q_id = $this->find($q);

        if ($p_id == $q_id) return;

        for($i = 0; $i < count($this->id); $i++) {
            if ($this->id[$i] == $p_id) {
                $this->id[$i] = $q_id;
            }
        }
    }
}