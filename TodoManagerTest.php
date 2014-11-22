<?php
require_once "TodoManager.php";
require_once "Todo.php";

class TodoManagerTest extends PHPUnit_Framework_TestCase{
    private $todoList;

    public function setUp()
    {
        $this->todoList =  array(
            'yesterdayTodo'=>new Todo("1番目のTODOデータ"),
            'todayTodo'=>new Todo("２番目のTODOデータ"),
            'tomorrowTodo'=>new Todo("３番目のTODOデータ")
        );
    }

    public function test1件目のTODOを取得する()
    {
        $manager = $this->createTodoManagerHasTask();
        $this->assertSameTodo($this->todoList["yesterdayTodo"], $manager->getTodo(1));
    }

    public function test2件目のTODOを取得する()
    {
        $manager = $this->createTodoManagerHasTask();
        $this->assertSameTodo($this->todoList["todayTodo"], $manager->getTodo(2));
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
        $this->assertSameTodo($this->todoList["yesterdayTodo"], $manager->getFirstTodo());
    }

    public function test最後のTODOを取得する()
    {
        //昨日と今日と明日のやることを順番に登録した時
        $manager = $this->createTodoManagerHasTask();
        $this->assertSameTodo($this->todoList["tomorrowTodo"], $manager->getLastTodo());

    }

    public function createTodoManagerHasTask()
    {
        $manager = new TodoManager();
        $manager->addTodo($this->todoList["yesterdayTodo"]);
        $manager->addTodo($this->todoList["todayTodo"]);
        $manager->addTodo($this->todoList["tomorrowTodo"]);
        return $manager;
    }

    public function assertSameTodo(Todo $expectedTodo, Todo $actualTodo)
    {
        $this->assertEquals($expectedTodo->title , $actualTodo->title);
        $this->assertEquals($expectedTodo->detail, $actualTodo->detail);
        $this->assertEquals($expectedTodo->getStatus() , $actualTodo->getStatus());
    }
}