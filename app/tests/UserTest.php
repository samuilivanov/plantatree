<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use App\Entity\User;

class UserTest extends TestCase
{
    protected $user;

    protected function setUp()
    {
        $this->user = new User();
    }

    public function testGetSetEmail()
    {
        $this->user->setEmail("test@email.com");
        $this->assertEquals($this->user->getEmail(), "test@email.com");
    }

    public function testGetSetFirstName()
    {
        $this->user->setFirstName("testName");
        $this->assertEquals($this->user->getFirstName(), "testName");
    }

    public function testGetSetLastName()
    {
        $this->user->setLastName("testName");
        $this->assertEquals($this->user->getLastName(), "testName");
    }

    public function testGetSetPassword()
    {
        $this->user->setPassword("testPass");
        $this->assertEquals($this->user->getPassword(), "testPass");
    }
}
