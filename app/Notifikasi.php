<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $guarded=[];

    public function sendNotify($data){
        return event(new Events\FloodEvent($data));
    }
}
