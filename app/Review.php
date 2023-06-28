<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = "reviews";
    
    
    public function subjek(){
        return $this->belongsTo('App\SubjekReview', 'subjek_id');
    }
}
