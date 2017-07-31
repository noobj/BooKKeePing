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

    public function setFuckedTimeAttribute($date)
    {
    	$this->attributes['created_at'] = \Carbon\Carbon::parse($date);
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
