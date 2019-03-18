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
});
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

$bst = new BST();
$bst->add(7);
$bst->add(3);
$bst->add(4);
$bst->add(10);
$bst->add(8);
$bst->add(2);
//$bst->print();
//var_dump($bst->contains(5));
//print_r($bst->each('pre'));
//
//print_r($bst->each('in'));
//
//print_r($bst->each('post'));
//
//print_r($bst->each('level'));

print_r($bst->remove(3));
$bst->print();