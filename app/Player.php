<?php
/**
 * Created by PhpStorm.
 * User: alaaj
 * Date: 6/20/17
 * Time: 2:18 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_number', 'time', 'shared_fb', 'difficulty'
    ];
}