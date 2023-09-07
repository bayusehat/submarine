<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Roster extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rosters';
    protected $primaryKey = 'id_roster';
    protected $hidden = ['created_at','deleted_at'];

    /**
     * Get all of the release for the Roster
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function release()
    {
        return $this->hasMany('App\Models\Release', 'id_roster', 'id_roster');
    }
}
