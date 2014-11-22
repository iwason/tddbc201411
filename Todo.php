<?php
/**
 * Created by PhpStorm.
 * User: iwamura
 * Date: 14/11/22
 * Time: 20:28
 */

class Todo {
    const STATUS_NEW = 0;
    const STATUS_DOING = 1;
    const STATUS_DONE= 2;

    /** @var string 見出し */
    public $title;
    /** @var string 詳細  */
    public $detail;
    /** @var Datetime 期日 */
    public $dueDate;
    /** @var int status */
    private $_status = self::STATUS_NEW;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function getStatus()
    {
        return $this->_status;
    }

    public function setDoing()
    {
        $this->_status = self::STATUS_DOING;
    }

    public function setDone()
    {
        $this->_status = self::STATUS_DONE;
    }




} 