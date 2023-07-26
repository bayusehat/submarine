<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Track extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tracks';
    protected $primaryKey = 'id_track';
    protected $hidden = ['created_at','deleted_at'];
}
