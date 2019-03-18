<?php

/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/18
 * Time: 下午9:49
 * 二分搜索树
 *   若任意节点的左子树不空，则左子树上所有结点的值均小于它的根结点的值；
 *   任意节点的右子树不空，则右子树上所有结点的值均大于它的根结点的值；
 *   任意节点的左、右子树也分别为二叉查找树。
 *   没有键值相等的节点（no duplicate nodes）。
 */
class BST
{
    private $root; #根节点
    private $size; #维护对应的数字

    public function __construct()
    {
        $this->size = 0;
        $this->root = null;
    }

    /**
     * 返回size
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * empty
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->size == 0;
    }

    /**
     * 添加节点
     * @param $e
     */
    public function add($e)
    {
        $this->root = $this->insert($this->root, $e);
    }

    /**
     * 递归调用
     * @param NodeTree $node
     * @param $e
     */
    private function insert($node, $e)
    {
        if ($node == null) {
            $this->size ++;
            return new NodeTree($e);
        }
        if ($node->e > $e) {
            $node->left = $this->insert($node->left, $e);
        } else if($node->e < $e) {
            $node->right = $this->insert($node->right, $e);
        }
        return $node;
    }

    /**
     * 查询是否包含对应元素
     * @param $e
     */
    public function contains($e): bool
    {
       return $this->serach($this->root, $e);
    }

    /**
     * 递归查找
     * @param $node
     * @param $e
     * @return bool
     */
    public function serach($node, $e)
    {
        if ($node == null) {
            return false;
        }
        if ($node->e == $e) {
            return true;
        }

        if ($node->e > $e) {
            return $this->serach($node->left, $e);
        } else {
            return $this->serach($node->right, $e);
        }
    }

    /**
     * @param $type
     * 深度优先
     * pre 前序遍历
     * in 中序遍历
     * post 后序遍历
     * 广度优先
     * level
     * @return array|void
     */
    public function each($type = 'pre')
    {
        switch ($type) {
            case 'pre':
                $re = $this->preOrder($this->root);
                break;
            case 'in':
                $re = $this->inOrder($this->root);
                break;
            case 'post':
                $re = $this->postOrder($this->root);
                break;
            case 'level':
                $re = $this->levelOrder($this->root);
                break;
            default:
                $re = [];
        }
        return $re;
    }
    /**
     * 前序遍历
     * 从根节点开始
     * 到左节点
     */
    private function preOrder($node)
    {
        static $arr = [];
        if ($node == null) {
            return;
        }
        $arr[] = $node->e;
        $this->preOrder($node->left);
        $this->preOrder($node->right);
        return $arr;
    }

    /**
     * 中序遍历
     * 从左节点开始
     * 再到根节点
     * 再到右节点
     */
    private function inOrder($node)
    {
        static $arr = [];
        if ($node == null) {
            return;
        }
        $this->inOrder($node->left);
        $arr[] = $node->e;
        $this->inOrder($node->right);
        return $arr;
    }


    /**
     * 后序序遍历
     * 先左
     * 再右节点
     *  再到根节点
     */
    private function postOrder($node)
    {
        static $arr = [];
        if ($node == null) {
            return;
        }
        $this->postOrder($node->left);
        $this->postOrder($node->right);
        $arr[] = $node->e;
        return $arr;
    }

    /**
     * 层级遍历
     * 借用队列实现
     *
     */
    private function levelOrder($node)
    {
        #申请一个队列
        $arr = [];
        $queue = [];
        $queue[] = $node;
        while ($queue) {
            $cur = array_shift($queue);
            $arr[] = $cur->e;
            if ($cur->left) {
                $queue[] = $cur->left;
            }
            if ($cur->right) {
                $queue[] = $cur->right;
            }
        }
        return $arr;
    }

    /**
     * 寻找最小元素
     * @throws Exception
     */
    public function min()
    {
        if ($this->root == null) {
            throw new \Exception('error bst empty');
        }
        return $this->serachMin($this->root);
    }

    /**
     * 递归向left走下去
     * @param $node
     * @return mixed
     */
    private function serachMin($node)
    {
        if ($node->left == null) {
            return $node;
        }
        return $this->serachMin($node->left);
    }

    /**
     * 寻找最小元素
     * @throws Exception
     */
    public function max()
    {
        if ($this->root == null) {
            throw new \Exception('error bst empty');
        }
        return $this->serachMax($this->root);
    }

    /**
     * 递归向left走下去
     * @param $node
     * @return mixed
     */
    private function serachMax($node)
    {
        if ($node->right == null) {
            return $node;
        }
        return $this->serachMax($node->right);
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

    /**
     * remove
     */
    public function removeMax()
    {
        $min = $this->max();
        $this->root = $this->deleteMax($this->root);
        return $min;
    }

    /**
     * 删除最大节点
     * @param $node
     */
    private function deleteMax($node)
    {
        if ($node->right == null) {
            $left = $node->left;
            $node->ledt = null;
            $this->size --;
            return $left;
        }
        $node->right = $this->deleteMax($node->right);
        return $node;
    }

    /**
     * 删除任意元素
     */
    public function remove($e)
    {
        $this->root = $this->removeNode($this->root, $e);
    }

    /**
     * 删除任意元素
     */
    private function removeNode($node, $e)
    {
        if ($node == null) {
            return null;
        }

        if ($node->e > $e) {
            $node->left = $this->removeNode($node->left, $e);
            return $node;
        } else if ($node->e < $e) {
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
    public function print()
    {
        print_r($this->root);
    }
}