<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
    		'amount',
    		'created_at',
            'category_id',
    		'user_id',
    		'memo'
    	];


    public function getCreatedAtAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('Y-m-d');
    }

    public function scopeCreatedAt($query)
    {
    	$query->where('created_at', '<=', \Carbon\Carbon::now());
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
