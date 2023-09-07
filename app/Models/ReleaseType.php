<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReleaseType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'release_types';
    protected $primaryKey = 'id_release_type';
    protected $hidden = ['created_at', 'deleted_at'];

    /**
     * Get the release that owns the ReleaseType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function release()
    {
        return $this->belongsTo('App\Models\Release', 'id_release', 'id_release');
    }
}
