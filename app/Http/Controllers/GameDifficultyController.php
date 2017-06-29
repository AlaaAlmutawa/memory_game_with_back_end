<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GameOption;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class GameDifficultyController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
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
