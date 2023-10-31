<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'events';
    protected $primaryKey = 'id_event';
    protected $hidden = ['created_at','deleted_at'];
    public $timestamp = true;

    public function tickets(){
        return $this->hasMany('App\Models\TicketOrder','id_event','id_event');
    }
}
