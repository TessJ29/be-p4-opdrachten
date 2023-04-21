<?php

class Landingpages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'title' => '<h1>Overzicht rijlessen</h1>',
        ];

        $this->view('Landingpages/index', $data);
    }

}