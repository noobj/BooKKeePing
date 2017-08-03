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

    /**
     * get created at attribute
     *
     * @param timestamp $date
     * @return \Carbon\Carbon
     */
    public function getCreatedAtAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('Y-m-d');
    }

    public function scopeToday($query)
    {
    	$query->where('created_at', '=', \Carbon\Carbon::today());
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    /**
     * Get the tags associated with the given record
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
