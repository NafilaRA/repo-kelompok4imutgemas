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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('invoice_number')->unique(); // No. Invoice transaksi
            $table->integer('total_price'); // Total bayar
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending'); // Status QRIS
            $table->string('payment_proof')->nullable(); // Bukti transfer/screenshot QRIS
            $table->text('shipping_address'); // Alamat tujuan pengiriman
            $table->enum('shipping_status', ['processing', 'shipping', 'completed'])->default('processing'); // Untuk fitur tracking
            $table->string('tracking_number')->nullable(); // Nomor resi kurir
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
