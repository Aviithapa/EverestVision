<?php


namespace App\Models\Auth;


use Illuminate\Database\Eloquent\Model;

class password_resets extends model
{
 protected $fillable=['email','token'];
}