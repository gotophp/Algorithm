<?php
/**
 * 选择排序
 * Created by PhpStorm.
 * User: yangj
 * Date: 2019/3/12
 * Time: 14:28
 */

class SelSort
{
    private $arr;
    public function __construct(array $arr = [])
    {
        $this->arr = $arr;
    }

    /**
     * @Notes:选择排序
     * @Interface selSort
     * @Author: y
     * @Time: 2019/3/12   14:30
     */
    public function selSort(): array
    {
        $length = count($this->arr);

        if ($length <= 1) {
            return $length;
        }
        #取一个最小值 循环当前一列 依次对比取出最小值 进行对比替换
        #内层循环 取i 后面元素 比较所以依次 $i + 1
        #为什么此次循环 内层循环不 length -1
        #因为冒泡左右对比 选择是取某个值 依次对比
        for ($i = 0; $i < $length; $i++) {
            $mix = $i; # 取每次循环第一个索引为最小值
            for ($j = $i + 1; $j < $length; $j ++) {
                if ($this->arr[$mix] > $this->arr[$j]) {
                    $mix = $j;
                }
            }

            $temp = $this->arr[$mix];
            $this->arr[$mix] = $this->arr[$i];
            $this->arr[$i] = $temp;
        }
        return $this->arr;
    }
}