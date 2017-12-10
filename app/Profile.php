<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id', 'avatar', 'about'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
