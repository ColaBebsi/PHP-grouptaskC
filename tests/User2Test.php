<?php 

// use classes\User2;
use PHPUnit\Framework\TestCase;

class User2Test extends TestCase
{
    public function testReturnsFullName()
    {
        require __DIR__ . '/../classes/User2.php';
        $user = new User2();

        $user->first_name = 'John';
        $user->surname = 'Doe';

        $this->assertEquals('John Doe', $user->getFullName());
    }
}