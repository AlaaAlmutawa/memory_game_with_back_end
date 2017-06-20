<?php

namespace App\Http\Controllers;
use App\Player;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index(){
        return view('index');
    }
    public function register(RegisterRequest $request){

    }
    public function congratulations(){
        return view('congratulations');
    }
}
