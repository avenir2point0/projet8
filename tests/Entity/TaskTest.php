<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 16/12/2018
 * Time: 19:23
 */

namespace App\Tests\Entity;


use App\Entity\Task;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    private $task;

    private $user;

    public function setUp()
    {
        $this->task = new Task();
        $this->user = new User();
    }

    public function testTaskIsInstanceOfTaskClass()
    {
        $this->assertInstanceOf(Task::class, $this->task);
    }

    public function testIdFalse()
    {
        $this->assertNull($this->task->getId());
    }

    public function testSetCreatedAt()
    {
        $this->task->setCreatedAt(new \DateTime());
        $this->assertInstanceOf(\DateTime::class, $this->task->getCreatedAt());
    }

    public function testTitleTrue()
    {
        $this->task->setTitle('title');
        $this->assertSame('title', $this->task->getTitle());
    }

    public function testContentTrue()
    {
        $this->task->setContent('content');
        $this->assertSame('content', $this->task->getContent());
    }

    public function testIsDoneisTrue()
    {
        $this->task->setIsDone(true);
        $this->assertEquals(true, $this->task->getIsDone());
    }

    public function testIsDoneFalse()
    {
        $this->assertFalse($this->task->isDone());
    }

    public function testToggle()
    {
        $this->task->toggle(true);
        $this->assertEquals(true, $this->task->isDone());
    }

    public function testUser()
    {
        $this->task->setUser($this->user);
        $this->assertEquals($this->user, $this->task->getUser());
    }

}