<?php
/**
 * 归变排序
 * 二路查找
 * Created by PhpStorm.
 * User: yangj
 * Date: 2019/3/12
 * Time: 14:09
 */

class MegSort
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
    public function megSort()
    {
        # 传递数组 初始头部指针与尾部指针
        $this->sort($this->arr, 0, count($this->arr) - 1);
        return $this->arr;
    }

    public function sort(&$arr, $left, $right)
    {
        if ($left < $right) {
            # 计算中间值
            $mid = floor(($left + $right) / 2); //取数组中间元素
            # 递归左边
            $this->sort($arr, $left, $mid);
            # 递归右边
            $this->sort($arr, $mid + 1, $right);
            # 排序
            $this->mergeSort($arr, $left, $mid, $right);
        }
    }

    public function mergeSort(&$arr, $left, $mid, $right)
    {
        $right_start = $mid + 1;
        $temp_arr = [];
        $temp_left = $left;
        $i = 0;
        while ($left <= $mid && $right_start <= $right) {
            if ($arr[$left] < $arr[$right_start]) {
                $temp_arr[$i++] = $arr[$left++];
            } else {
                $temp_arr[$i++] = $arr[$right_start++];
            }
        }
        #处理剩余的
        while ($left <= $mid) {
            $temp_arr[$i++] = $arr[$left++];
        }

        while ($right_start <= $right) {
            $temp_arr[$i++] = $arr[$right_start++];
        }
        # 从left 可能有半边的
        for ($i = 0; $i < count($temp_arr); $i++) {
            $arr[$temp_left + $i] = $temp_arr[$i];
        }
    }
}

$obj = new MegSort([1, 21, 41, 2, 53, 1, 213, 31,423, 21, 10]);
$arr = [1, 21, 41, 2, 53, 1, 213, 31,423, 21, 10];
print_r($obj->megSort());

//print_r($arr);