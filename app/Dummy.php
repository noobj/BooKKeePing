<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dummy extends Model
{
    protected $fillable = [ 'body', 'fucked_time', 'user_id' ];

    public function setFuckedTimeAttribute($date)
    {
    	$this->attributes['fucked_time'] = \Carbon\Carbon::parse($date);
    }

    public function scopeFucked($query)
    {
    	$query->where('fucked_time', '<=', \Carbon\Carbon::now());
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
