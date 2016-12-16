<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    protected $fillable = [
        'url'
    ];

    public function cat()
    {
        return $this->belongsToMany('App\Cat');
    }
}
