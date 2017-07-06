<?php

namespace App\Http\Controllers\Web_Controller;
use App\Http\Controllers\Controller;
use App\GameOption;
use Illuminate\Http\Request;
use App\Player;
use View;

class DisplayController extends Controller
{
    //
    public function easy(){
        $gameOption = GameOption::where('difficulty','easy')->first();
        $view = View::make('disks')->with('gameOption',$gameOption);
        $view->render();
        return $view;
    }
    public function medium(){
        $gameOption = GameOption::where('difficulty','medium')->first();
        $view = View::make('disks')->with('gameOption',$gameOption);
        $view->render();
        return $view;
    }
    public function hard(){
        $gameOption = GameOption::where('difficulty','hard')->first();
        $view = View::make('disks')->with('gameOption',$gameOption);
        $view->render();
        return $view;
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
