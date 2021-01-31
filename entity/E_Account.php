<?php
class Entity_Account
{
    public $Id;
    public $Username;
    public $Password;
    public $Name;
    public $Email;
    public $Sex;
    public $Phone;
    public $LastOnline;
    public $Address;
    public $IsAdmin;


    public function __construct($_Id, $_Username, $_Password, $_Name, $_Email, $_Phone, $_Address, $_Sex, $_LastOnline, $_IsAdmin)
    {
        $this->Id = $_Id;
        $this->Username = $_Username;
        $this->Password = $_Password;
        $this->Name = $_Name;
        $this->Email = $_Email;
        $this->Phone = $_Phone;
        $this->Address = $_Address;
        $this->Sex = $_Sex;
        $this->LastOnline = $_LastOnline;
        $this->IsAdmin = $_IsAdmin;
    }
}
