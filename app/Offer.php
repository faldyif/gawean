<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public function jobs() {
    	return $this->belongsTo('App\User');
    }
}
