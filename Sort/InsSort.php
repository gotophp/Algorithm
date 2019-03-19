<?php
/**
 * 插入排序
 * Created by PhpStorm.
 * User: yangj
 * Date: 2019/3/12
 * Time: 14:51
 */

class InsSort
{
    private $arr;

    public function __construct(array $arr = [])
    {
        $this->arr = $arr;
    }

    public function insSort(): array
    {
        $length = count($this->arr);
        if ($length <= 1) {
            return $this->arr;
        }
        /**
         * 插入排序 取数组中的第一个值 进行对比 小于 互换位置
         */

        for ($i = 0; $i < $length; $i++) {
            # 取出上层循环的第一个元素
            $temp = $this->arr[$i];
            #遍历已经排序好的数组
            for ($j = $i - 1; $j >= 0; $j--) {
                # 把temp 空出来的位置 对应右移补全
                if ($this->arr[$j] > $temp) {
                    $this->arr[$j + 1] = $this->arr[$j];
                    $this->arr[$j] = $temp;
                }
            }
        }
        return $this->arr;
    }
}
