<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class FrontTopPageController extends Controller
{
    protected function index()
    {
        return view('welcome');
    }
}

?>