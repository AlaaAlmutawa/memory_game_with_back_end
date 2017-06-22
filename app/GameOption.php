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
    protected $fillable = [
        'difficulty', 'cols', 'rows'
    ];
}