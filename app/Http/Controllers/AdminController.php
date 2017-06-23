<?php

namespace App\Http\Controllers;

use App\GameOption;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

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
    public function saveGameEdits(Request $request){
            $gameOption = GameOption::where('difficulty',$request->get('difficulty'))->first();
            if($gameOption != null) {
                $gameOption->cols = $request->get('cols');
                $gameOption->rows = $request->get('rows');
            }else{
                $gameOption = new GameOption();
                $gameOption->difficulty = $request->get('difficulty');
                $gameOption->cols = $request->get('cols');
                $gameOption->rows = $request->get('rows');
            }
            $gameOption->save();
            return [];
    }
}
