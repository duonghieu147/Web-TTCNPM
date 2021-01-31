<?php
class Entity_WebInfo
{
    public $Id;
    public $Phone;
    public $Email;
    public $Facebook;
    public $Twitter;
    public $Address;
    public $Webside;


    public function __construct($_Id, $_Phone, $_Email, $_Facebook, $_Twitter, $_Address, $_Webside)
    {
        $this->Id = $_Id;
        $this->Phone = $_Phone;
        $this->Email = $_Email;
        $this->Facebook = $_Facebook;
        $this->Twitter = $_Twitter;
        $this->Address = $_Address;
        $this->Webside = $_Webside;
    }
}
