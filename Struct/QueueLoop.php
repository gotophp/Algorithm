<?php
/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/17
 * Time: 下午2:56
 * 循环队列的数据结构实现
 * 基于数组的实现
 *
 * 核心思想
 * 利用多余一个空间
 * 队尾指针 + 1 取余 队列长度 == 队首 说明就满了
 * 循环队列 优势在于出队是O(1) 级别
 *
 */
class QueueLoop
{
    private $data = []; #队列值
    private $size = 0; #队列值个数
    private $head = 0; #头指向的位置
    private $tail = 0; #尾部指向的位置
    private $length; #队列容量
    /**
     * 初始化一个数组 声明一个队列
     * StackArray constructor.
     * @param int $length
     * @param bool $resize
     */
    public function __construct(int $length = 4)
    {
        # 声明多一个数组 进行计算
        $this->length = $length + 1;
    }

    /**
     * 获取size
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * 判断是否为空
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->size == 0;
    }

    /**
     * 获取长度
     * @return int
     */
    public function getLength(): int
    {
        return $this->length - 1;
    }

    /**
     * 进队列
     * @param $e
     */
    public function push($e): void
    {
        # 循环队列是否是满的

        if (($this->tail + 1) % $this->length == $this->head) {
            print_r($this);
            throw new \Exception(__FUNCTION__ . '队列已满！！！');
        }
        $this->data[$this->tail] = $e;
        $this->tail = ($this->tail + 1) % $this->length;
        $this->size ++;
    }

    /**
     * 获取循环队列的队首
     * @return int
     * @throws Exception
     */
    public function getHead(): int
    {
        if ($this->isEmpty()) {
            throw new \Exception(__FUNCTION__ . '队列为空！！！');
        }
        return $this->data[$this->head];
    }


    /**
     * 出队列
     * @param $e
     */
    public function pop(): int
    {
        if ($this->isEmpty()) {
            throw new \Exception(__FUNCTION__ . '队列为空！！！');
        }
        $re = $this->data[$this->head];
        $this->data[$this->head] = null;
        $this->head = ($this->head + 1) % $this->length;
        $this->size --;
        return $re;
    }



    /**
     * 打印队列
     */
    public function print()
    {
       // print_r($this->data);
        echo PHP_EOL . 'Queue: size长度 = ' . $this->getSize(), ' capacity容量 = ' .$this->getLength()
            . PHP_EOL . 'top->(' . PHP_EOL;
        for ($i = 0; $i < $this->size; $i++) {
            echo '    [' . $i . '] ' . ' => ' . $this->data[($i + 1) % $this->length] . PHP_EOL;
        }
        echo ') tail';
    }
}