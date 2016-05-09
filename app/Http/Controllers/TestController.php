<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
    public function index()
    {
//        $a=1111111122;
//        $_SESSION['user']=$a;
//        print_r($_SESSION['user']);
        $a=1111111122;
        $_SESSION['user']=$a;
        dd($_SESSION['user']);
    }
}
