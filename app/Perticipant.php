<?php

    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

class Perticipant extends Authenticatable
{
    use Notifiable;

    protected $guard = 'perticipant';

    protected $fillable = [
        'code','password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function poll(){
        return $this->belongsTo(\App\Poll::class);
    }


}
