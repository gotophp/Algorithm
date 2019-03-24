<?php

/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/24
 * Time: 上午11:22
 * 字典树
 * 存储 字典
 *   c -> a -> b
 *          -> v
 */
class TrieTree
{
    private $root;
    private $size;

    public function __construct()
    {
        $this->root = new NodeTrie();
        $this->size = 0;
    }

    public function getSize()
    {
        return $this->size;
    }

    /**
     * 添加单词
     * @param $word
     */
    public function add($word)
    {
        /** @var 非递归实现
        $node = $this->root;

        for ($i = 0; $i < strlen($word); $i++) {
            $key = ord($word[$i]);
            if(empty($node->next[$key])) {
                $node->next[$key] = new NodeTrie();
            }
            $node = $node->next[$key];
        }
        if (!$node->isword) {
            $node->isword = true;
            $this->size++;
        }
         * **/
        # 递归实现
        $this->root = $this->insert($this->root, $word, 0);
    }

    /**
     * @return NodeTrie
     */
    public function insert($node, $word, $index)
    {
        if ($index == strlen($word)) {
            if (!$node->isword) {
                $node->isword = true;
                $this->size ++;
            }
            return $node;
        }
        $key = $word[$index]; # 不转到底
        if(empty($node->next[$key])) {
            $node->next[$key] = new NodeTrie();
        }
        $node->next[$key] = $this->insert($node->next[$key], $word, $index + 1);
        return $node;

    }

    /**
     * 查询单词是否存在
     */
    public function contains($word)
    {
        /** 非递归实现
            $node = $this->root;

            for ($i = 0; $i < strlen($word); $i++) {
                $key = $word[$i];
                if(!empty($node->next[$key])) {
                    $node = $node->next[$key];
                } else {
                    return false;
                }
            }
            return $node->isword;
         * *
         */
        # 递归实现
        return $this->buildContains($this->root, $word, 0, __FUNCTION__);
    }

    public function buildContains($node, $word, $index, $func)
    {
        # 递归到底的情况
        if ($index == strlen($word)) {
            return $func == 'isPrefix' || $node->isword;
        }
        $key = $word[$index];
        if (empty($node->next[$key])) {
            return false;
        }
        return $this->buildContains($node->next[$key], $word, $index + 1, $func);
    }

    /**
     * 匹配前缀
     * @param $prefix
     */
    public function isPrefix($prefix)
    {
        return $this->buildContains($this->root, $prefix, 0, __FUNCTION__);
    }

    /**
     * 正则搜索 ..中间可能包含点点
     */
    public function match($word)
    {
       return $this->buildMatch($this->root, $word, 0);
    }

    public function buildMatch($node, $word, $index)
    {
        if ($index == strlen($word)) {
            return $node->isword;
        }
        $key = $word[$index];
        if ($key != '.') {
            if (empty($node->next[$key])) {
                return false;
            }
            return $this->buildMatch($node->next[$key], $word, $index + 1);
        } else { #可能有多个
            foreach ($node->next as $k => $v) {
                return $this->buildMatch($node->next[$k], $word, $index + 1);
            }
            return false;
        }
    }
    public function print()
    {
        print_r($this->root);
    }
}