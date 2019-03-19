<?php

/**
 * 快速排序
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/13
 * Time: 下午9:46
 */
class QuiSort1
{
    private $arr;
    public function __construct(array $arr = [])
    {
        $this->arr = $arr;
    }

    public function quiSort(): array
    {
        return $this->quickSort($this->arr);
    }

    private function quickSort($arr): array
    {
        $length = count($arr);
        if ($length <= 1) {
            return $arr;
        }
        $temp = $arr[0];
        $left = $right = [];
        #从1开始 不然会递归没法停止
        for ($i = 1; $i < $length; $i++) {
            if ($arr[$i] < $temp) {
                $left[] = $arr[$i];
            } else {
                $right[] = $arr[$i];
            }
        }
        $left = $this->quickSort($left);
        $right = $this->quickSort($right);
        return array_merge($left, [$temp], $right);
    }
}