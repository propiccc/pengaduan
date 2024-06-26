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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            
            $table->enum('tipe', ['pengaduan','konsultasi'])->default('pengaduan');

            $table->unsignedBiginteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  

            $table->unsignedBiginteger('penerima_id')->nullable();
            $table->foreign('penerima_id')->references('id')->on('users')->onDelete('cascade');  

            $table->text('tentang');
            $table->text('aduan');
    
            $table->string('image');

            $table->enum('status',[ 'tolak','pending','terima'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
