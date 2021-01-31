<?php
class Entity_Review
{
    public $Id;
    public $Content;
    public $Star;
    public $DeviceId;
    public $AccountId;
    public $CreatedTime;
    public $UpdatedTime;
    public $Name;


    public function __construct($_Id, $_Content, $_Star, $_DeviceId, $_AccountId, $_CreatedTime, $_UpdatedTime, $_Name)
    {
        $this->Id = $_Id;
        $this->Content = $_Content;
        $this->Star = $_Star;
        $this->DeviceId = $_DeviceId;
        $this->AccountId = $_AccountId;
        $this->CreatedTime = $_CreatedTime;
        $this->UpdatedTime = $_UpdatedTime;
        $this->Name = $_Name;
    }
}
