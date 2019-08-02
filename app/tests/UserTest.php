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

    public function testGetSetPassword()
    {
        $this->user->setPassword("testPass");
        $this->assertEquals($this->user->getPassword(), "testPass");
    }
}
