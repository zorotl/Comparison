<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['user_id', 'answers'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
