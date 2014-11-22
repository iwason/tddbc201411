<?php
require_once "TodoManager.php";

class TodoAddTest extends PHPUnit_Framework_TestCase{
    private $todoList =
        array(
        'yesterdayTodo'=>"1番目のTODOデータ",
        'todayTodo'=>"２番目のTODOデータ",
        'tomorrowTodo'=>"２番目のTODOデータ"
        );

    public function test1件目のTODOを取得する()
    {
        $manager = $this->createTodoManagerHasTask();
        $this->assertEquals($this->todoList["yesterdayTodo"], $manager->getTodo(1));
    }

    public function test2件目のTODOを取得する()
    {
        $manager = $this->createTodoManagerHasTask();
        $this->assertEquals($this->todoList["todayTodo"], $manager->getTodo(2));
    }

    public function testTODOの件数を取得する()
    {
        $manager = $this->createTodoManagerHasTask();
        $this->assertEquals(count($this->todoList),$manager->getTodoCount());
    }

    public function test全てのTODOを取得する()
    {
        $manager = $this->createTodoManagerHasTask();
        $this->assertEquals(
                        array($this->todoList["yesterdayTodo"],
                              $this->todoList["todayTodo"],
                              $this->todoList["tomorrowTodo"])
                        ,$manager->getTodoList());

    }

    public function test１番目のTODOを取得する()
    {
        //昨日と今日と明日のやることを順番に登録した時
        $manager = $this->createTodoManagerHasTask();
        //先頭のやることを取得し 昨日のやることを取得できること。
        $this->assertEquals($this->todoList["yesterdayTodo"], $manager->getFirstTodo());
    }

    public function test最後のTODOを取得する()
    {
        //昨日と今日と明日のやることを順番に登録した時
        $manager = $this->createTodoManagerHasTask();
        $this->assertEquals($this->todoList["tomorrowTodo"], $manager->getLastTodo());

    }

    public function createTodoManagerHasTask()
    {
        $manager = new TodoManager();
        $manager->addTodo($this->todoList["yesterdayTodo"]);
        $manager->addTodo($this->todoList["todayTodo"]);
        $manager->addTodo($this->todoList["tomorrowTodo"]);
        return $manager;
    }

}