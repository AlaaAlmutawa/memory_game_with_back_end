<?php

namespace App\Http\Controllers;

use App\GameOption;
use Illuminate\Http\Request;
use App\Player;
use View;

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
    public function top_10(Request $request){
        $difficulty = $request->get('difficulty');
       $players = Player::where('difficulty',$difficulty)->orderBy('time_record','asc')->limit('10')->get();
        $view = View::make('top_10')->with('players',$players);
       // user View  //render the html with the names and append it to the current layout //create the view for the top_10 separately.
        $view->render();

        return $view;


    }
}
