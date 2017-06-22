<?php

namespace App\Http\Controllers;
use App\GameOption;
use App\Player;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Request;

class MainController extends Controller
{
    //
    public function index(){
        return view('index');
    }
    public function register(){
        $input = Request::all();
        Player::create($input);
        return redirect('congratulations');
       // players()->save(new Player($request->all()));
       // return redirect('congratulations');
    }
    public function congratulations(){
        return view('congratulations');
    }
    public function dashboard(){
        $game_options = DB::table('game_options')->get();
        return view('dashboard')->with($game_options);
    }
}
