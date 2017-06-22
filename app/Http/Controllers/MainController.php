<?php

namespace App\Http\Controllers;
use App\GameOption;
use App\Player;
use Illuminate\Support\Facades\DB;
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
    }
    public function congratulations(){
        return view('congratulations');
    }
}
