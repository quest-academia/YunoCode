<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class TopPageController extends Controller
{
    protected function index()
    {
        return view('welcome');
    }
}

?>