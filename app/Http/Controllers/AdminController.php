<?php

namespace App\Http\Controllers;


use App\Player;

class AdminController extends Controller
{
    //
    public function dashboard(){
        return view('dashboard');
    }
    public function players(){
        $players = Player::all();
        return view('players')->with('players',$players);
    }
}
