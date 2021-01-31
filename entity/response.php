<?php

class Response
{
    public $Errors;
    public $Success;
    public $Data;
    public $Status;


    public function __construct()
    {
        $this->Errors = array();
        $this->Success = true;
    }
}
