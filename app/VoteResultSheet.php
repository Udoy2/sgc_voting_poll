<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoteResultSheet extends Model
{
    protected $guard = [];

    protected $fillable = [
        'poll_id','perticipant_id','teacher_id','topic_id','point'
    ];
}
