<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Release extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'releases';
    protected $primaryKey = 'id_release';
    protected $hidden = ['created_at','deleted_at'];
    public $timestamps = true;

    /**
     * Get the user that owns the Release
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roster()
    {
        return $this->belongsTo('App\Models\Roster', 'id_roster', 'id_roster');
    }

    /**
     * Get all of the release_image for the Release
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function release_image()
    {
        return $this->hasMany('App\Models\ReleaseImage', 'id_release', 'id_release');
    }

    /**
     * Get the release_type that owns the Release
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function release_type()
    {
        return $this->belongsTo('App\Models\ReleaseType', 'id_release_type', 'id_release_type');
    }

    /**
     * Get the roster that owns the Release
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
}
