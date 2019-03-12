<?php
/**
 * 冒泡排序
 * Created by PhpStorm.
 * User: yangj
 * Date: 2019/3/12
 * Time: 14:09
 */

class BubSort
{
    private $arr = [];
    public function __construct(array $arr = [])
    {
        $this->arr = $arr;
    }

    /**
     * 比较左右相邻的两个节点大小
     * @Interface bubSort
     * @param $arr
     * @Author: y
     * @Time: 2019/3/12   14:11
     */
    public function bubSort(): array
    {
        $length = count($this->arr);
        if ($length <= 1) {
            return $this->arr;
        }
        # 第二层 - $i 是因为每一层上循环都已经确定了一个最大值排序到末尾
        for ($i = 0; $i < $length; $i++) {
            for ($j = 0; $j < $length - $i - 1; $j++) {
                if ($this->arr[$j] > $this->arr[$j + 1]) {
                    $temp = $this->arr[$j];
                    $this->arr[$j] = $this->arr[$j + 1];
                    $this->arr[$j + 1] = $temp;
                }
            }
            print_r($this->arr);
        }
        return $this->arr;
    }
}

$obj = new BubSort([1, 21, 41, 2, 53, 1, 213, 31,423, 21, 10]);
print_r($obj->bubSort());