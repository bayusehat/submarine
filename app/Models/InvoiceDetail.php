<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'invoice_details';
    protected $primaryKey = 'id_invoice_detail';
    protected $hidden = ['created_at','deleted_at'];
    public $timestamps = true;


    /**
     * Get all of the comments for the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice', 'id_invoice', 'id_invoice');
    }
}
