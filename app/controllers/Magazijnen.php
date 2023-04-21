<?php
class Magazijnen extends Controller
{


    public function __construct()
    {

    }

    public function index()
    { 
        $this->View('Magazijnen/index');
    }

}