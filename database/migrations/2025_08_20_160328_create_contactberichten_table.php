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
        Schema::create('contactberrichten', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->string('email');
            $table->text('bericht');
            $table->boolean('gelezen')->default(false); // 👈 Voeg deze kolom toe
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactberrichten'); // 👈 Correcte tabelnaam
    }
};

