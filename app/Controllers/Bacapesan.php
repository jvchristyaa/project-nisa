<?php

namespace App\Controllers;
class Bacapesan extends BaseController
{
    public function index()
    {
        return view('pesan/pesan');
    }
    public function prosesPesan()
    {
        $data['pesan']=$_POST['pesan'];
        return view('pesan/tampilpesan', $data);
    }
}