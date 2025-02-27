<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->string('action');
            $table->text('description')->default(''); // Berikan nilai default
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Pastikan ada relasi ke user
            $table->timestamps();
        });


    }

    public function down()
    {
        Schema::dropIfExists('activity_logs');
    }

};
