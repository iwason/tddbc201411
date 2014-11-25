<?php
/**
 * Created by PhpStorm.
 * User: iwamura
 * Date: 14/11/22
 * Time: 13:34
 */

class TodoManager {
    /** @var array Todo */
    public $todoList = array();

    public function addTodo(Todo $todo)
    {
        $this->todoList[] = $todo;
    }

    public function getTodo($index)
    {
       return $this->todoList[intval(--$index)];
    }

    public function getTodoList()
    {
        return $this->todoList;
    }

    public function getTodoCount()
    {
        return count($this->todoList);
    }

    public function getFirstTodo()
    {
        return reset($this->todoList);
    }

    public function getLastTodo()
    {
        return end($this->todoList);
    }

    /**
     * 最初のTodoを取り出し、Todoリストから削除する
     * @return mixed
     */
    public function shiftTodo()
    {
        return array_shift($this->todoList);
    }

    /**
     * 最後のTodoを取り出し、Todoリストから削除する
     * @return mixed
     */
    public function popTodo()
    {
        return array_pop($this->todoList);
    }

    public function deleteAll()
    {
       $this->todoList = array();
    }

    public function changeOrder(Todo $todo, $orderTo)
    {
        //todo 仮実装
        array_splice($this->todoList,--$orderTo,0,array($todo));
    }


}