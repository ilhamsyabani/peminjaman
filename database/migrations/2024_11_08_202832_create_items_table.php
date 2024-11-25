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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('official_code')->unique()->nullable();
            $table->string('code')->unique();
            $table->string('name');
            $table->integer('amount')->default(1);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('location_id');       // Mengacu ke lokasi, ruang, atau loker
            $table->string('location_type');                 // Menentukan apakah ini lokasi, ruang, atau loker
            $table->enum('condition', ['baik', 'rusak', 'hilang'])->default('baik');
            $table->enum('status', ['tersedia', 'dipinjam', 'hilang'])->default('tersedia');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('purchase_id');       // ID dari tabel purchases
            $table->timestamps();
        
            // Foreign keys
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
