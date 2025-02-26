<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('artist_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('professional_title')->nullable();
            $table->string('specialization')->nullable();
            $table->string('commission_status')->default('closed');
            $table->string('turnaround_time')->nullable();
            $table->integer('max_active_commissions')->default(0);
            $table->string('default_response_time')->nullable();
            $table->text('skills')->nullable();
            $table->string('instagram_username')->nullable();
            $table->string('twitter_username')->nullable();
            $table->string('portfolio_url')->nullable();
            $table->string('artstation_username')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('artist_profiles');
    }
};
