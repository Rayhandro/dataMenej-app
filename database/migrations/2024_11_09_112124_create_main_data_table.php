<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('main_data', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('nomor_proposal')->nullable();
            $table->string('deskripsi_pekerjaan');
            $table->decimal('amount_sc', 15, 2);
            $table->decimal('amount_po', 15, 2);
            $table->string('budget')->nullable();
            $table->foreign('cost_center_id')->references('id')->on('table_costcenter')->onDelete('cascade');
            $table->foreign('mta_id')->references('id')->on('table_mta')->onDelete('cascade');
            $table->string('vendor');
            $table->string('sc_no');
            $table->string('po_no');
            $table->string('status_gr');
            $table->string('periode');
            $table->string('gr_no')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_data');
    }
};
