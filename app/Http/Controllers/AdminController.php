<?php

namespace App\Http\Controllers;


use App\Player;
use App\Click;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard(){
        return view('dashboard');
    }
    public function players(){
        $players = Player::all();
        $clicks = Click::all()->last()->id;
        return view('players', compact('players','clicks'));
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
