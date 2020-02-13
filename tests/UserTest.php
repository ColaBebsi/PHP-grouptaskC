<?php 

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase 
{
    // public function setUp():void
    // {
    //     $this->user = new User();
    // }

    public function testGetEmail()
    {
        include_once __DIR__ . '/../classes/dbh.class.php';
        include_once __DIR__ . '/../classes/user.class.php';


        $user = new User();

        $user->email = 'test@test';

        $this->assertEquals('test@test', $user->getEmail());
    }

    public function testGetUsername()
    {
        $user = new User();

        $user->username = 'username';

        $this->assertEquals('username', $user->getUsername());
    }

    public function testGetPassword()
    {
        $user = new User();

        $user->password = 'password';

        $this->assertEquals('password', $user->getPassword());
    }
}