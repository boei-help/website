<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jamesh\Uuid\HasUuid;

class Activity extends Model
{
    use HasUuid;

    /**
     * The visitor that belong to the activity.
     */
    public function visitor()
    {
        return $this->belongsTo('App\Visitor');
    }
}
