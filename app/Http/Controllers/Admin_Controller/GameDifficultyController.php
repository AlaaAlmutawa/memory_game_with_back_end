<?php

namespace App\Http\Controllers\Admin_Controller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GameOption;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class GameDifficultyController extends Controller
{
    //ADMIN RELATED 
    public function edit(Request $request){ //editing function for the admin  
        $gameOption = GameOption::where('difficulty',$request->get('difficulty'))->first(); 
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
