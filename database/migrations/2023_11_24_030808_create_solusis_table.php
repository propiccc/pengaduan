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
        Schema::create('solusis', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            
            $table->string('image')->nullable();

            $table->text('solusi');

            $table->enum('tipe', ['pengaduan','konsultasi'])->default('pengaduan');
            
            $table->unsignedBiginteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');  

            $table->unsignedBiginteger('pengaduan_id');
            $table->foreign('pengaduan_id')->references('id')->on('pengaduans')->onDelete('restrict');  

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solusis');
    }
};
