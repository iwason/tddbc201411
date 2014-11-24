<?php
/**
 * Created by PhpStorm.
 * User: iwamura
 * Date: 14/11/22
 * Time: 13:34
 */

class TodoManager {
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
}