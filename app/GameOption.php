<?php
/**
 * Created by PhpStorm.
 * User: alaaj
 * Date: 6/22/17
 * Time: 1:04 PM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;


class GameOption extends Model
{
    protected $table = 'game_options';
    protected $fillable = [
        'difficulty', 'cols', 'rows'
    ];
}