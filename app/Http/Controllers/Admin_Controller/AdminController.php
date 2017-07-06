<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Http\Controllers\Controller;
use App\Player;
use App\Click;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function dashboard(){
        return view('dashboard');
    }
    public function players(){
        $players = Player::all();
        $clicks = Click::count();
        return view('players', compact('players','clicks'));
    }
    public function logout(){
        Auth::logout();
        return redirect('admin/dashboard');
    }
}
