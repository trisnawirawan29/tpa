<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class scan extends Controller
{
    function index(){
        return view('scanner');
    }
}
