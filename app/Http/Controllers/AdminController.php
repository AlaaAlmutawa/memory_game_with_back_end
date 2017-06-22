<?php

namespace App\Http\Controllers;

use App\GameOption;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    //
    public function dashboard(){
        return view('dashboard');
    }
    public function editEasy(){
        $gameOption = DB::table('game_options')->where('difficulty','easy')->first();
        $object = GameOption::create($gameOption);
        return Response::json($object);
    }
}
