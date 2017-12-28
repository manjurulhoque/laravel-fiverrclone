<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function gig()
    {
    	return $this->belongsTo('App\Gig');
    }
}
