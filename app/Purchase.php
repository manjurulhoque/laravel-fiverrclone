<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['user_id', 'gig_id', 'to_user_id', 'price', 'days'];

    public function gig()
    {
    	return $this->belongsTo('App\Gig');
    }
}
