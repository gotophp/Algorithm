<?php
/**
 * Created by PhpStorm.
 * User: zhuhongwen
 * Date: 2019/3/17
 * Time: 下午2:40
 */


spl_autoload_register(function ($class){
    if (is_file('./Struct/' . $class . '.php')) {
        require_once './Struct/' . $class . '.php';
    }
    if (is_file('./Tree/' . $class . '.php')) {
        require_once './Tree/' . $class . '.php';
    }
    if (is_file('./Sort/' . $class . '.php')) {
        require_once './Sort/' . $class . '.php';
    }
    if (is_file('./Map/' . $class . '.php')) {
        require_once './Map/' . $class . '.php';
    }
    if (is_file('./Set/' . $class . '.php')) {
        require_once './Set/' . $class . '.php';
    }
    if (is_file('./UnionFind/' . $class . '.php')) {
        require_once './UnionFind/' . $class . '.php';
    }
    if (is_file('./RBTree/' . $class . '.php')) {
        require_once './RBTree/' . $class . '.php';
    }
    if (is_file('./Hash/' . $class . '.php')) {
        require_once './Hash/' . $class . '.php';
    }
});
function start_time() {
    return microtime(true);
}
function end_time() {
    return microtime(true);
}
function sub($start, $end) {
    return round($end - $start,4);
}
#排序比较
<<<<<<< HEAD
$arr = range(1,1000000);
shuffle($arr);

=======
//$arr = range(1,1000);
//shuffle($arr);
//
>>>>>>> 064592e20af84d8f2203a4b3f35a5c7546fb67e4
//$start = start_time();
//$bub = new BubSort($arr);
//$bub->bubSort();
//$end = end_time();
//echo '冒泡排序 一百万条记录对比-> '. sub($start, $end) . '秒' .PHP_EOL;
//
//
//$start = start_time();
//$bub = new InsSort($arr);
//$bub->insSort();
//$end = end_time();
//echo '插入排序 一百万条记录对比-> '. sub($start, $end) . '秒' .PHP_EOL;
//
//
//$start = start_time();
//$bub = new SelSort($arr);
//$bub->selSort();
//$end = end_time();
//echo '选择排序 一百万条记录对比-> '. sub($start, $end) . '秒' .PHP_EOL;
//
//
//$start = start_time();
//$bub = new QuiSort($arr);
//$bub->quiSort();
//$end = end_time();
//echo '快速排序1 一百万条记录对比-> '. sub($start, $end) . '秒' .PHP_EOL;
//
//$start = start_time();
//$bub = new QuiSort1($arr);
//$bub->quiSort();
//$end = end_time();
//echo '快速排序2 一百万条记录对比-> '. sub($start, $end) . '秒' .PHP_EOL;
//
//
//$start = start_time();
//$bub = new MegSort($arr);
//$bub->megSort();
//$end = end_time();
//echo '归并排序一百万条记录对比-> '. sub($start, $end) . '秒';
### 数组调试
/*$arr = new ArrayData(5, true);
$arr->addFirst(1);
$arr->addFirst(2);
$arr->addFirst(3);
$arr->addFirst(4);
$arr->addLast(7);
$arr->addLast(78);
$arr->print();
$arr->removeLast();
$arr->print();
$e = $arr->remove(2);
echo $e;*/



#### 栈调试

/*$arr = new StackArray(5, true);

$arr->push(1);
$arr->push(2);
$arr->push(3);
$arr->push(4);
$arr->push(7);
$arr->push(78);
$arr->pop();
$arr->print();*/

#### 队列调试

//$arr = new QueueArray();
//$arr->push(1);
//$arr->push(2);
//$arr->push(3);
//$arr->print();
//$arr->pop(1);
//$arr->print();

### 循环队列
//$arr = new QueueLoop(3);
//$arr->push(1);
//$arr->push(2);
//$arr->push(3);
//$arr->print();
//$arr->pop();
//$arr->print();
//$arr->push(4);
//$arr->print();
//$arr->pop();
//$arr->push(5);
//$arr->print();

###单链表

//$link = new LinkList();
//$link->addLast(1);
//$link->addLast(2);
//$link->addLast(3);
//echo $link->getSize();
//$link->set(1, 4);
//$link->print();
//echo $link->getLast();
//$link->remove(1);
//$link->print();


### 链表实现栈

//$link = new LinkListStack();
//$link->push(1);
//$link->push(2);
//$link->push(3);
//$link->print();

### 链表实现队列

//$link = new QueueLinkList();
//
//$link->enqueue(1);
//$link->enqueue(2);
//$link->enqueue(3);
//print_r($link->print());
//echo $link->dequeue();
//print_r($link->print());


### 二分搜索树
//
//$bst = new BST();
//$bst->add(7);
//$bst->add(3);
//$bst->add(4);
//$bst->add(10);
//$bst->add(8);
//$bst->add(2);
////$bst->print();
////var_dump($bst->contains(5));
////print_r($bst->each('pre'));
////
////print_r($bst->each('in'));
////
////print_r($bst->each('post'));
////
////print_r($bst->each('level'));
//
//print_r($bst->remove(3));
//$bst->print();
### 测试二分搜索树实现的set
//$set = new TreeSet();
//$set->add(3);
//$set->add(2);
//$set->add(4);
//$set->add(4);
//$set->print();
//
### 测试链表实现的map
//$set = new LinkListMap();
//$set->add('a', 1);
//$set->add('b', 2);
//$set->add('c', 3);
//$set->add('a',3);
//$set->remove('b');
//$set->print();

#测试树实现的map
//$set = new BSTMap();
//$set->add('a', 1);
//$set->add('b', 2);
//$set->add('c', 3);
//$set->add('a',3);
//$set->remove('b');
//$set->print();

//$heap = new MaxHeap();
//
//$heap->add(90);
//$heap->add(81);
//$heap->add(72);
//$heap->add(50);
//$heap->add(80);
//$heap->add(47);
//$heap->add(50);
//$heap->add(26);
//$heap->add(40);
//$heap->add(58);
//$heap->add(1);
////$heap->print();
//echo $heap->extractMax() .PHP_EOL;
//$heap->print();

//$start = start_time();
//$bub = new BubSort($arr);
//$bub->bubSort();
//$end = end_time();
//echo '冒泡排序 一百万条记录对比-> '. sub($start, $end) . '秒' .PHP_EOL;
### 堆排序
//for ($i = 0; $i < 10; $i ++) {
//    $arr[] = random_int(1, 10000);
//}
//shuffle($arr);
//print_r($arr);
//$start = start_time();
//$heap = new MaxHeap($arr);
//sleep(1);
//$end = end_time();
//echo '堆排序 一万条记录对比-> '. sub($start, $end) . '秒' .PHP_EOL;
//
//
//$start = start_time();
//$heap1 = new MaxHeap();
//
//foreach ($arr as $key => $val) {$query_l
//    $heap1->add($val);
//}
//sleep(1);
//$end = end_time();
//echo '堆排序 一万条记录对比-> '. sub($start, $end) . '秒' .PHP_EOL;

//for ($i = 0; $i < 3; $i ++) {
//    $arr[] = random_int(1, 10);
//}
//$arr = [2,4,3];
////shuffle($arr);
////echo '<pre>';
////print_r($arr);
//$arr = new SegmentTree($arr);
//$arr->print();
//
//echo $arr->query(0,1);

# 字典树
//$node = new TrieTree();
//$node->add('cat');
//$node->add('cab');
//$node->print();
////var_dump($node->isPrefix('cb'));
////
//var_dump($node->match('c.'));

# 并查集
//
//$node = new UnionFIndTwo(10);
//
////$node->print();
//
//$node->unionElements(1,2);
//
//$node->print();
//
//$node->unionElements(3,4);
//$node->print();
//$node->unionElements(4,2);
//$node->print();
//
//
//var_dump($node->isConnected(1,4));


//$node = new UnionFIndThree(10);
//$node->unionElements(0,1);
//$node->unionElements(4,2);
//
//$node->unionElements(4,0);
//$node->print();

# AVL 平衡二叉树

//$avl = new AVLlBSTTree();
//$avl->add('x','a');
//$avl->add('y','b');
//$avl->add('z','c');
//
//$avl->print();
//
//var_dump($avl->isBST());
//$avl_map
//var_dump($avl->isBalance());

//$avl_map = new AVLMap();
//$avl_map->add('a', 'a');
//$avl_map->add('b', 'b');
//$avl_map->add('c', 'c');
//$avl_map->print();
//$avl_map->remove('b');
//$avl_map->print();



$hash = new HashTable();

$hash->add('test', 'test');

$hash->print();
