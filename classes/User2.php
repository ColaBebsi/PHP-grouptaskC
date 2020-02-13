<?php 
//namespace classes;

class User2
{
    public $first_name;
    public $surname;

    public function getFullName()
    {
        return "$this->first_name $this->surname";
    }
}