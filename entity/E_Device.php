<?php
class Entity_Device
{
    public $Id;
    public $Name;
    public $Supplier;
    public $Amount;
    public $Description;
    public $Price;
    public $Discount;
    public $Content;
    public $ReviewTotal;
    public $ReviewPoint;
    public $Number;
    public $Img;


    public function __construct($_Id, $_Name, $_Supplier, $_Amount, $_Description, $_Price, $_Discount, $_Content, $_ReviewTotal, $_ReviewPoint,$_Img)
    {
        $this->Id = $_Id;
        $this->Name = $_Name;
        $this->Supplier = $_Supplier;
        $this->Amount = $_Amount;
        $this->Description = $_Description;
        $this->Price = $_Price;
        $this->Discount = $_Discount;
        $this->Content = $_Content;
        $this->ReviewTotal = $_ReviewTotal;
        $this->ReviewPoint = $_ReviewPoint;
        $this->Number = 1;
        $this->Img = $_Img;
    }
}
