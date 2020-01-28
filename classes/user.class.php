<?php 

include_once('dbh.class.php');

class User 
{
    private $db;

    public function __construct()
    {
        $this->db = new Dbh();
        $this->db = $this->db->connect();
    }
}