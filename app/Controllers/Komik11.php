<?php

namespace App\Controllers;

class Komik1 extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home Datang'
        ];
        
        return view('komik1/index', $data);
        
    }

}