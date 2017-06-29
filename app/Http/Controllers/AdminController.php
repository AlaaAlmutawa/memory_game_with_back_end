<?php

namespace App\Http\Controllers;


use App\Player;
use App\Click;
use Illuminate\Support\Facades\DB;

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
    public function track_clicks(){
        $click = new Click;
        $click->save();
        return [];
    }
}
