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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('description');
            $table->string('basic_plan_title');
            $table->integer('basic_plan_price');
            $table->string('basic_plan_description');
            $table->string('basic_plan_days');
            $table->string('standard_plan_title');
            $table->integer('standard_plan_price');
            $table->string('standard_plan_description');
            $table->string('standard_plan_days');
            $table->string('premium_plan_title');
            $table->integer('premium_plan_price');
            $table->string('premium_plan_description');
            $table->string('premium_plan_days');
            $table->string('image')->nullable();
            $table->decimal('average_star', 2, 1);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained('subcategory');
            $table->foreignId('subcategory_id')->constrained('subcategory');
        });

        // Schema::create('services', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        //     $table->string('title');
        //     $table->string('description');

        //     $table->string('image')->nullable();
        //     $table->decimal('average_star', 2, 1);
        //     $table->foreignId('user_id')->constrained();

        //     $table->foreignId('category_id')->constrained('subcategory');
        //     $table->foreignId('subcategory_id')->constrained('subcategory');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
