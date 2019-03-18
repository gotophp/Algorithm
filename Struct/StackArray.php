<?php
/**
 * Created by PhpStorm.
 * User: yj
 * Date: 2019/3/17
 * Time: 下午2:02
 * 栈的数据结构实现
 * 基于数组的实现
 */

class StackArray
{
    private $array;

    /**
     * 初始化一个数组 声明一个栈
     * StackArray constructor.
     * @param int $length
     * @param bool $resize
     */
    public function __construct(int $length = 10, bool $resize = false)
    {
        $this->array = new ArrayData($length, $resize);
    }

    /**
     * 获取size
     * @return int
     */
    public function getSize(): int
    {
        return $this->array->getSize();
    }

    /**
     * 判断是否为空
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->array->isEmpty();
    }

    /**
     * 获取长度
     * @return int
     */
    public function getLength(): int
    {
        return $this->array->getLength();
    }

    /**
     * 进栈
     * @param $e
     */
    public function push($e): void
    {
        $this->array->addLast($e);
    }

    /**
     * 出栈
     * @return int
     */
    public function pop(): int
    {
        return $this->array->removeLast();
    }

    /**
     * 返回栈顶元素
     * @return mixed
     */
    public function peek()
    {
        return $this->array->getLast();
    }

    /**
     * 打印栈
     */
    public function print()
    {
        echo PHP_EOL . 'Stack: size长度 = ' . $this->getSize(), ' capacity容量 = ' .$this->getLength()
            . PHP_EOL . '(' . PHP_EOL;
        for ($i = 0; $i < $this->getSize(); $i++) {
            echo '    [' . $i . '] ' . ' => ' .$this->array->get($i) . PHP_EOL;
        }
        echo ')->top';
    }
}
