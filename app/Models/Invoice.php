<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'invoices';
    protected $primaryKey = 'id_invoice';
    protected $hidden = ['created_at','deleted_at'];
    public $timestamps = true;


    /**
     * Get all of the comments for the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoice_detail()
    {
        return $this->hasMany('App\Models\InvoiceDetail', 'id_invoice', 'id_invoice');
    }
}
