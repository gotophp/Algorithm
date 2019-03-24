<?php

/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/19
 * Time: 下午10:38
 * AVL树
 * 左右子树的高度不超过 -> 1
 */
class AVLlBSTMap
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
     * 获取节点高度
     * @param $node
     * @return int
     */
    public function getHeight($node)
    {
        return $node == null ? 0 : $node->height;
    }

    /**
     * 平衡因子
     * @param $node
     * @return int|number
     */
    public function getBalanceFactor($node)
    {
        return $node == null ? 0 : $this->getHeight($node->left) - $this->getHeight($node->right) ;
    }

    /**
     * 判断是否是一棵二分搜索树
     * 基于中序遍历
     * 二分搜索树
     * 可以排序 从小到大
     */
    public function isBST()
    {
        $arr = $this->inOrder($this->root);
        for ($i = 0; $i < count($arr) - 1; $i++) {
            if ($arr[$i] > $arr[$i + 1]) {
                return false;
            }
        }
        return true;
    }

    /**
     * 判断是否是平衡二叉树
     * 左右的高度相减不会大于1
     */
    public function isBalance()
    {
        return $this->bulidBalance($this->root);
    }

    /**
     * 递归实现分析
     * @param $node
     * @return bool
     */
    public function bulidBalance($node)
    {
        if ($node == null) {
            return true;
        }

        $ba = abs($this->getBalanceFactor($node));

        if ($ba > 1) {
            return false;
        }

        return $this->bulidBalance($node->left) && $this->bulidBalance($node->right);
    }

    public function inOrder($node)
    {
        static $arr = [];
        if ($node == null) {
            return;
        }
        $this->inOrder($node->left);
        $arr[] = $node->key;
        $this->inOrder($node->right);
        return $arr;
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
            return new NodeAVL($key, $val);
        }

        if ($node->key > $key) {
            $node->left = $this->insert($node->left, $key, $val);
        } else if ($node->key < $key) {
             $node->right = $this->insert($node->right, $key, $val);
        } else {
            $node->val = $val;
        }
        # 计算节点的高度
        $node->height = 1 + max($this->getHeight($node->left), $this->getHeight($node->right));

        # 平衡因子
        $bala = $this->getBalanceFactor($node);

        #判断平衡因子
        if (abs($bala) > 1) {
            echo '平衡因子[' . $bala . ']---' . $node->val;
        }

        # 计算平衡因子 LL
        # 当左子树打破平衡 右循转
        if ($bala > 1 && $this->getBalanceFactor($node->left) >= 0) {
            return $this->rightRotate($node);
        }

        # 当右子树打破平衡 左循转 RR
        if ($bala < -1 && $this->getBalanceFactor($node->right) <= 0) {
            return $this->leftRotate($node);
        }
        # LR 先左循环 再右循环
        if ($bala > 1 && $this->getBalanceFactor($node->left) < 0) {
            $node->left = $this->leftRotate($node->left);
            return $this->rightRotate($node);
        }

        # RL
        if ($bala < -1 && $this->getBalanceFactor($node->right) <= 0) {
            $node->right = $this->rightRotate($node->right);
            return $this->leftRotate($node);
        }
        return $node;
    }

    /**
     * 右循环
     * @param $node
     *        y                    x
     *       / \                 /   \
     *      x  t4               z     y
     *     / \                 / \   / \
     *    z  t3               t1 t2 t3 t4
     *   / \
     *  t1  t2
     * @return
     */
    private function rightRotate($node)
    {
        //当左子树赋值给x
        $x = $node->left;
        //左子树的右节点值 拿出来赋值给t3
        $t3 = $x->right;
        //把原有的整个树赋值给右子树
        $x->right = $node;
        //并把子字树删掉赋值当前的t3
        $node->left = $t3;

        # 继续更新高度 只有x 跟 y 的高度发生改变
        $node->height = max($this->getHeight($node->left), $this->getHeight($node->right)) + 1;
        $x->height = max($this->getHeight($x->left), $this->getHeight($x->right)) + 1;

        return $x;
    }


    /**
     * 右循环
     * @param $node
     *         y                    x
     *       /   \                 / \
     *      t4   x                y   2
     *          / \              /\    / \
     *        t3  z            t4 t4 t1 t2
     *            /\
     *          t1  t2
     * @return
     */
    private function leftRotate($node)
    {
        //当左子树赋值给x
        $x = $node->right;
        //左子树的右节点值 拿出来赋值给t3
        $t3 = $x->left;
        //把原有的整个树赋值给右子树
        $x->left = $node;
        //并把子字树删掉赋值当前的t3
        $node->right = $t3;

        # 继续更新高度 只有x 跟 y 的高度发生改变
        $node->height = max($this->getHeight($node->left), $this->getHeight($node->right)) + 1;
        $x->height = max($this->getHeight($x->left), $this->getHeight($x->right)) + 1;

        return $x;
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
        return $this->getNode($key) !== null;
    }

    /**
     * 获取val
     * @param $key
     * @return null
     */
    public function getKey($key)
    {
        $node = $this->getNode($key);
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
        $node = $this->getNode($key);
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