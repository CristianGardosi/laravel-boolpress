<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
        // !RELAZIONE 1 - * CON POST
        public function user() {
            return $this->belongsTo('App\User');
        }
}
