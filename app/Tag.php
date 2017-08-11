<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;

    protected $fillable = [
    	'name'
    ];

 	/**
     * Get the records associated with the given tag
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function records()
    {
    	return $this->belongsToMany('App\Record');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
