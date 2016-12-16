<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Content extends Model
{

    public function feed()
    {
        return $this->hasOne('App\Feed', 'id', 'feed_id');
    }

}
