<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id('id_invoice');
            $table->string('invoice_to');
            $table->string('invoice_cp');
            $table->date('invoice_date');
            $table->text('invoice_description');
            $table->text('invoice_address');
            $table->text('invoice_email');
            $table->text('invoice_amount');
            $table->text('invoice_total');
            $table->text('invoice_status');
            $table->integer('id_user');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
