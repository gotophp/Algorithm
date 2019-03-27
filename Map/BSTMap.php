<?php

/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/19
 * Time: 下午10:38
 * 基于二分搜索树实现map 字典
 */
class BSTMap
{
    public $root; #虚拟的头节点
    public $size;

    public function __construct()
    {
        $this->root = null;
        $this->size = 0;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function isEmpty()
    {
        return $this->size == 0;
    }

    /**
     * 添加
     * @param $key
     * @param $val
     */
    public function add($key, $val)
    {
        $this->root = $this->insert($this->root, $key, $val);
    }

    public function insert($node, $key, $val)
    {
        if ($node == null) {
            $this->size ++;
            return new NodeTreeMap($key, $val);
        }

        if ($node->key > $key) {
            $node->left = $this->insert($node->left, $key, $val);
        } else if ($node->key < $key) {
             $node->right = $this->insert($node->right, $key, $val);
        } else {
            $node->val = $val;
        }
        return $node;
    }


    /**
     * 获取某个key
     */
    public function getNode($node, $key)
    {
        if ($node == null) {
            return null;
        }

        if ($node->key == $key) {
            return $node;
        } else if ($node->key > $key) {
            return $this->getNode($node->left, $key);
        } else {
            return $this->getNode($node->right, $key);
        }
    }

    /**
     * 是否包含
     * @param $key
     * @return bool
     */
    public function contains($key)
    {
        return $this->getNode($this->root, $key) !== null;
    }

    /**
     * 获取val
     * @param $key
     * @return null
     */
    public function getKey($key)
    {
        $node = $this->getNode($this->root, $key);
        return $node->val ?? null;
    }

    /**
     * set 更新元素
     * @param $key
     * @param $val
     * @throws Exception
     */
    public function set($key, $val)
    {
        $node = $this->getNode($this->root, $key);
        if ($node == null) {
            throw new \Exception('key不存在');
        }
        $node->val = $val;
    }

    /**
     * remove 删除
     * @param $key
     * @return null
     */
    public function remove($key)
    {
        $this->root = $this->removeNode($this->root, $key);
    }

    public function removeNode($node, $e)
    {
        if ($node == null) {
            return null;
        }

        if ($node->key > $e) {
            $node->left = $this->removeNode($node->left, $e);
            return $node;
        } else if ($node->key < $e) {
            $node->right = $this->removeNode($node->right, $e);
            return $node;
        } else { // ==
            if ($node->left == null) {
                $right = $node->right;
                $node->left = null;
                $this->size --;
                return $right;
            }

            if ($node->right == null) {
                $left = $node->left;
                $node->right = null;
                $this->size --;
                return $left;
            }
            #找到右子树的后继最小元素
            $mix = $this->serachMin($node->right);
            #删除当前节点的最小元素
            $mix->right = $this->deleteMin($node->right);
            #左边赋值
            $mix->left = $node->left;
            #指控
            $node->left = $node->right = null;
            return $mix;
        }
    }


    /**
     * remove
     */
    public function removeMin()
    {
        $min = $this->min();
        $this->root = $this->deleteMin($this->root);
        return $min;
    }

    /**
     * 删除最小节点
     * @param $node
     */
    private function deleteMin($node)
    {
        if ($node->left == null) {
            $right = $node->right;
            $node->right = null;
            $this->size --;
            return $right;
        }
        $node->left = $this->deleteMin($node->left);
        return $node;
    }

    public function print()
    {
        print_r($this->root);
    }
}