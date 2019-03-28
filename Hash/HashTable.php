<?php

/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/27
 * Time: 下午10:32
 */
class HashTable
{
    private static $upperTol = 10;
    private static $lowerTol = 2;
    private static $initCapactity = 7;

    private $hash_table = []; //
    private $m; //
    private $size; //个数

    public function __construct($m)
    {
        if ($m) {
            $this->m = $m;
        } else {
            $this->m = self::$initCapactity;
        }
        $this->size = 0;

        for ($i = 0; $i < $m; $i++) {
            $this->hash_table[$i] = new BSTMap();
        }
    }


    private function hashCode(string $str)
    {
        $hash = 0;
        $len = strlen($str);

        if ($len == 0) return $hash;

        for ($i = 0; $i < $len; $i++) {
            $h = $hash << 5;
            $h -= $hash;
            $h += ord($str[$i]);
            $hash = $h;
            $hash &= 0xFFFFFFFF;
        }
        return $hash;
    }

    private function hash($key)
    {
        return ($this->hashCode($key) & 0x7fffffff) % $this->m;
    }


    public function getSize()
    {
        return $this->size;
    }

    private function map($key): BSTMap
    {
        return $this->hash_table[$this->hash($key)];
    }

    public function add($key, $val)
    {
        $map = $this->map($key);
        if ($map->contains($key)) {
            $map->set($key, $val);
        } else {
            $map->add($key, $val);
            $this->size ++;

            if ($this->size >= self::$upperTol * $this->m) {
               $this->resize(2 * $this->m);
            }
        }
    }

    public function remove($key)
    {
        $map = $this->map($key);
        $ret = null;
        if ($map->contains($map)) {
            $ret = $map->remove($key);
            $this->size --;
            if ($this->size <= self::$lowerTol * $this->m && $this->m / 2 > self::$initCapactity) {
                $this->resize($this->m / 2);
            }
        }
        return $ret;
    }

    public function set($key, $val)
    {
        $map = $this->map($key);
        if ($map->contains($map)) {
             $map->set($key, $val);
        }
    }

    public function contains($key)
    {
        return $this->map($key)->contains($key);
    }

    private function resize($new_m)
    {
        $new_hash_table = [];
        for ($i = 0; $i < $new_m; $i++) {
            $new_hash_table[$i] = new BSTMap();
        }
        $old_m = $this->m;
        $this->m = $new_m;

        for ($i = 0; $i < $old_m; $i++) {
            $map = $this->hash_table[$i];
            $new_hash_table[$this->hash($i)] = $map;
        }
        $this->hash_table = $new_hash_table;
    }

    public function get($key)
    {
       return $this->map($key)->getKey($key);
    }

    public function print()
    {
        print_r($this->hash_table);
    }
}