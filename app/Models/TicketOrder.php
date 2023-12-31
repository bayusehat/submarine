<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketOrder extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'ticket_orders';
    protected $primaryKey = 'id_ticket';
    protected $hidden = ['created_at','deleted_at'];
    protected $fillable = ['payment_status','id_event'];

    public $timestamps = true;

    /**
     * Get the user that owns the TicketOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user', 'id_user');
    }

    public function event()
    {
        return $this->belongsTo('App\Models\Event','id_event','id_event');
    }
}
