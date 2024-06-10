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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('honesty');
            $table->string('municipal');
            $table->string('id_number');
            $table->string('name');
            $table->string('sex');
            $table->string('nationality');
            $table->string('health_certificate_number');
            $table->string('occupation');
            $table->string('issue_date_hc_H');
            $table->string('issue_date_hc_AD');
            $table->string('end_date_hc_H');
            $table->string('end_date_hc_AD');
            $table->string('type_of_edu');
            $table->string('end_date_edu');
            $table->string('licence_number');
            $table->string('facility_name');
            $table->string('facility_no');
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
