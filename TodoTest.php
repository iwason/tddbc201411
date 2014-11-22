<?php
require_once "Todo.php";

class TodoTest extends PHPUnit_Framework_TestCase{
    public function testTODOを生成()
    {
        $title = "memo";
        $todo = new Todo($title);
        $this->assertEquals($title,$todo->title);
    }

    public function testTODOを着手中にする()
    {
        $todo = new Todo("sampleTodo");
        $todo->setDoing();
        $this->assertEquals(Todo::STATUS_DOING,$todo->getStatus());
    }

    public function testTODOを完了にする()
    {
        $todo = new Todo("sampleTodo");
        $todo->setDone();
        $this->assertEquals(Todo::STATUS_DONE,$todo->getStatus());
    }

}