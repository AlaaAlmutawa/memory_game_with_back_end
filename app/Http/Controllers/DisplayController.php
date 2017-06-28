<?php

namespace App\Http\Controllers;

use App\GameOption;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    //
    public function easy(){
        $game = GameOption::where('difficulty','easy')->first();
        return $game;
    }
    public function medium(){
        $game = GameOption::where('difficulty','medium')->first();
        return $game;
    }
    public function hard(){
        $game = GameOption::where('difficulty','hard')->first();
        return $game;
    }
}
