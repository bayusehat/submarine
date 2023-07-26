<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'genres';
    protected $primaryKey = 'id_genre';
    protected $hidden = ['created_at','deleted_at'];
    public $timestamps = true;
}
