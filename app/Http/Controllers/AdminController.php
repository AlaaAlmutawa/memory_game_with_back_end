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
        $gameOption = GameOption::where('difficulty','easy')->first();
        return $gameOption;
    }
    public function editMedium(){
        $gameOption = GameOption::where('difficulty','medium')->first();
        return $gameOption;
    }
    public function editHard(){
        $gameOption = GameOption::where('difficulty','hard')->first();
        return $gameOption;
    }
    public function saveGameEdits(){

    }
}
