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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
     $table->string('title');
     $table->string('slug');
     $table->unsignedInteger('category_id');
     $table->bigInteger('target_donation');
     $table->date('max_date');
     $table->text('description');
     $table->string('image');
     $table->unsignedInteger('user_id');
     $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
