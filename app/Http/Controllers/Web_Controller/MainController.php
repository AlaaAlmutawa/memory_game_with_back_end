<?php

namespace App\Http\Controllers\Web_Controller;
use App\Http\Controllers\Controller;
use App\GameOption;
use App\Player;

use Illuminate\Http\Request;
use App\Click;

class MainController extends Controller
{
    //
    public function index(){
        return view('index');
    }
    public function register(Request $request){
        $input = $request->all();
        $object = Player::create($input);
        $user_id= $object->id;
        return redirect('congratulations')->with('user_id',$user_id);
    }
    public function congratulations(){
        $user_id = session("user_id");
        return view('congratulations',compact("user_id"));
    }
    public function fbshare(Request $request){
        $player = Player::where('id',$request->get('user_id'))->first();
        $player->shared_fb = true;
        $player->save();
        return redirect('/');
    }
    public function track_clicks(){
        $click = new Click;
        $click->save();
        return [];
    }
}
