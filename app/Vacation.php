<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    public function worker()
    {
        return $this->belongsTo('App\Worker','worker_id');
    }

    public function evento()
    {
     	return $this->hasMany('App\CalendarioEvento');
	}
}