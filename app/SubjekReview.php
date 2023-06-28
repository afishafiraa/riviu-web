<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjekReview extends Model
{
    protected $table = "subjek_review";
    
    public function review(){
        return $this->hasOne('App\Review', 'subjek_id');
    }
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
    
}
