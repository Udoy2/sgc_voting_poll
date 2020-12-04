<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    public function perticipants(){
        return $this->hasMany(\App\Perticipant::class);
    }
}
