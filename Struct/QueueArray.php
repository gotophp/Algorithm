<?php
/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/17
 * Time: 下午2:56
 * 队列的数据结构实现
 * 基于数组的实现
 */
class QueueArray
{
    private $array;

    /**
     * 初始化一个数组 声明一个队列
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
     * 进队列
     * @param $e
     */
    public function push($e): void
    {
        $this->array->addLast($e);
    }


    /**
     * 出队列
     * @param $e
     */
    public function pop(): int
    {
        return $this->array->removeFirst();
    }

    /**
     * 获取队首
     */
    public function getHead(): int
    {
        return $this->array->getFirst();
    }


    /**
     * 打印队列
     */
    public function print()
    {
        echo PHP_EOL . 'Queue: size长度 = ' . $this->getSize(), ' capacity容量 = ' .$this->getLength()
            . PHP_EOL . 'top->(' . PHP_EOL;
        for ($i = 0; $i < $this->getSize(); $i++) {
            echo '    [' . $i . '] ' . ' => ' .$this->array->get($i) . PHP_EOL;
        }
        echo ')';
    }
}