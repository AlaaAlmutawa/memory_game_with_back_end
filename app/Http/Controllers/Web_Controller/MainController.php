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
        try{
            $object = Player::create($input);
        }catch(\Illuminate\Database\QueryException $e){
            return abort('500'); 
        }
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
        return redirect('congratulations')->with('user_id',$request->get('user_id'));
    }
    public function track_clicks(){
        $click = new Click;
        $click->save();
        return [];
    }
}
