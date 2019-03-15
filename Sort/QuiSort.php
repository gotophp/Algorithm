<?php

/**
 * 快速排序
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/13
 * Time: 下午9:46
 */
class QuiSort
{
    private $arr;
    public function __construct(array $arr = [])
    {
        $this->arr = $arr;
    }

    public function quiSort(): array
    {
        $this->quickSort($this->arr, 0, count($this->arr) - 1);
        return $this->arr;
    }

    private function quickSort(array &$arr,int $left, int $right)
    {
        if ($left > $right) {
            return;
        }
        $base = $arr[$left]; # 选取左边第一个为基本节点
        $i = $left; #左边
        $j = $right; #右边

        while ($i != $j) { #相等说明两个指针已经遇到

            # 选取左边节点为基准节点 应该从右边开始遍历
            # 寻找小于基准的元素
            # 找到右边比
            while ($arr[$j] >= $base && $i < $j) {
                $j--;
            }
            # 寻找左边大于基准的元素
            while ($arr[$i] <= $base && $i < $j) {
                $i++;
            }

            # 停止互换元素
            $temp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $temp;
        }
        # 当指针相等的时候改变 基准与 相等值互换
        $arr[$left] = $arr[$i];
        $arr[$i] = $base;
        # $i 的位置已经确定
        # 然后排序左边
        $this->quickSort($arr, $left, $i - 1);
        # 然后排序左边
        $this->quickSort($arr, $i + 1, $right);

    }
}
$obj = new QuiSort([1, 21, 41, 2, 53, 1, 213, 31,423, 21, 10]);
print_r($obj->quiSort());