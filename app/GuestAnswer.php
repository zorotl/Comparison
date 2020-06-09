<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestAnswer extends Model
{
    protected $fillable = ['answers', 'general_code', 'personal_code'];
}
