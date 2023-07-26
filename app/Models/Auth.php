<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auth extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $hidden = ['created_at','deleted_at'];
    public $timestamps = true;
}
