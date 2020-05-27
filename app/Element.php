<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    public function page ()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
