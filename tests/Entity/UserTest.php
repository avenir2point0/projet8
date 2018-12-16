<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 16/12/2018
 * Time: 17:51
 */

namespace App\Tests\Entity;


use App\Entity\Task;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private $user;

    private $task;

    public function setUp()
    {
        $this->user = new User();
        $this->task = new Task();
    }

    public function testUserIsInstanceOfUserClass()
    {
        $this->assertInstanceOf(User::class, $this->user);
    }

    public function testIdIsNull()
    {
        $this->assertNull($this->user->getId());
    }

    public function testUsernameTrue()
    {
        $this->user->setUsername('testnom');
        $this->assertSame('testnom', $this->user->getUsername());
    }

    public function testGetSalt()
    {
        $this->assertSame(null, $this->user->getSalt());
    }

    public function testGetpassword()
    {
        $this->user->setPassword('password');
        $this->assertSame('password', $this->user->getPassword());
    }

    public function testGetEmail()
    {
        $this->user->setEmail('testemail@mail.fr');
        $this->assertSame('testemail@mail.fr', $this->user->getEmail());
    }

    public function testEraseCredentials()
    {
        $this->assertNull($this->user->eraseCredentials());
    }

    public function testGetRolesTrue()
    {
        $roles = ['ROLE_USER'];
        $this->user->setRoles($roles);
        $this->assertSame($roles, $this->user->getRoles());
    }

    public function testAddTaskTrue()
    {
        $this->user->addtask($this->task);
        $this->assertCount(1, $this->user->getTask());
    }

    /**
     * @after
     */
    public function testRemoveTaskTrue()
    {
        $this->user->removeTask($this->task);
        $this->assertCount(0, $this->user->getTask());
    }
}
