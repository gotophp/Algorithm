<?php
/**
 * Created by PhpStorm.
 * User: yj
 * Date: 2019/3/17
 * Time: 下午12:28
 * 模拟数组数据结构实现
 * 1.尽量不去借助php内置函数实现
 * 2.动态扩容
 * 3.动态防止震荡
 */

Class ArrayData
{
    private $data;   #存储数组
    private $size;   #数组长度
    private $length; #初始化数组长度
    private $resize; #数组是否动态扩容

    /**
     * 初始化数组
     * 默认数组存储长度
     * ArrayData constructor.
     */
    public function __construct(int $length = 10, bool $resize = false)
    {
        # php数组不需要声明长度
        $this->length = $length;
        $this->data = [];
        $this->size = 0;
        $this->resize = $resize;
    }

    /**
     * 获取数组中存储的个数
     * size 是从0开头 记住
     * 比如 size指向到11 返回11
     * 实际数组的索引是到 10
     * 数组总量比索引大一
     * 所以当前不需要减一
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * 获取数组中存储的大小容量
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * 判断数组是否为空
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->size == 0;
    }

    /**
     * 向数组中追加一个元素
     * @param int $e
     * @throws Exception
     */
    public function addLast(int $e): void
    {
        $this->add($this->size, $e);
    }

    /**
     * 向数组中前一个元素
     * @param int $e
     */
    public function addFirst(int $e): void
    {
        $this->add(0, $e);
    }

    /**
     * 添加数组
     * @param int $index
     * @param int $e
     * @throws Exception
     */
    public function add(int $index, int $e): void
    {
        # 要保证index 在size 中
        if ($index < 0 || $index > $this->size) {
            throw new \Exception(__FUNCTION__  . '超出数组边界！！！');
        }

        # 判断是否动态扩容
        if ($this->resize === true && $this->size == $this->length) {
            $this->resize($this->length * 2); #开始
        }

        if ($this->resize === false && $this->size == $this->length) {
            throw new \Exception(__FUNCTION__  . '数组已经满了！！！');
        }


        /**
         * 所有的数组指针往后面移一位 保证新插入的位置 在数组之前
         *
         */
        for ($i = $this->size - 1; $i >= $index; $i--) {
            $this->data[$i + 1] = $this->data[$i];
        }
        $this->data[$index] = $e;
        # 维护size
        $this->size++;
    }

    public function print()
    {
        echo PHP_EOL . 'Array: size长度 = ' . $this->size, ' capacity容量 = ' . $this->length
            . PHP_EOL . '(' . PHP_EOL;
        for ($i = 0; $i < $this->size; $i++) {
            echo '    [' . $i . '] ' . ' => ' . $this->data[$i] . PHP_EOL;
        }
        echo ')';
    }

    /**
     * 获取 index 索引位置的元素
     * @param int $index
     * @return int
     */
    public function get(int $index): int
    {
        if ($index < 0 || $index >= $this->size) {
            throw new \Exception(__FUNCTION__ . '的index 超出边界！！！');
        }
        return $this->data[$index];
    }

    /**
     * 获取第一个index 元素
     */
    public function getFirst()
    {
        return $this->get(0);
    }

    /**
     * 获取最后一个
     * @return mixed
     */
    public function getLast()
    {
        return $this->getLast($this->size - 1);
    }
    /**
     * set index 索引位置的元素
     * @param int $index
     * @param int $e
     * @throws Exception
     */
    public function set(int $index,int $e): void
    {
        if ($index < 0 || $index >= $this->size) {
            throw new \Exception(__FUNCTION__ . '的index 超出边界！！！');
        }
        $this->data[$index] = $e;
    }

    /**
     * 查找对应的元素是否在数组内
     * contains 包含
     * @return bool
     */
    public function contains(int $e): bool
    {
        for ($i = 0; $i < $this->size; $i++) {
            if ($this->data[$i] == $e) {
                return true;
            }
        }
        return false;
    }


    /**
     * find 当前元素在数组中的 index
     * @param int $e
     * @return int
     */
    public function find(int $e): int
    {
        for ($i = 0; $i < $this->size; $i++) {
            if ($this->data[$i] == $e) {
                return $i;
            }
        }
        return -1;
    }

    /**
     *
     * 删除对应的数组索引
     * @param int $index
     */
    public function remove(int $index): int
    {
        if ($index < 0 || $index >= $this->size) {
            throw new \Exception(__FUNCTION__ . '的index 超出边界！！！');
        }
        $res = $this->data[$index];
        # 大于当前数组的索引 索引-1
        for ($i = $index + 1; $i < $this->size; $i++) {
            echo 1;
            $this->data[$i - 1] = $this->data[$i];
        }
        # 维护size
        $this->size --;
        $this->data[$this->size] = null; //对应unset

        # 动态缩小数组 防止复杂的抖动
        if ($this->size == $this->length / 4 && $this->length / 2 != 0) {
            $this->resize($this->length / 2);
        }
        return $res;
    }

    /**
     * 删除数组中第一个
     */
    public function removeFirst(): int
    {
        return $this->remove(0);
    }

    /**
     *  删除数组中最后一个
     */
    public function removeLast(): int
    {
        return $this->remove($this->size - 1);
    }

    /**
     * 根据对应的值删除数组
     * @param int $e
     */
    public function removeElement(int $e): void
    {
        $index = $this->find($e);
        if ($index !== -1) {
            $this->remove($index);
        }
    }

    /**
     * 扩容到原有的两倍
     */
    private function resize($length): void
    {
        $this->length = $length;
    }

    /**
     * 数组互换
     * @param $i
     * @param $j
     * @throws Exception
     */
    public function swap($i, $j)
    {
        if ($i < 0 || $i >= $this->size || $j < 0 || $j >= $this->size) {
            throw new \Exception(__FUNCTION__ . '的index 超出边界！！！');
        }
        $temp = $this->data[$j];
        $this->data[$j] = $this->data[$i];
        $this->data[$i] = $temp;
    }


    public function getArray()
    {
        return $this->data;
    }
}
