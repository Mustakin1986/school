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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('role')->default(3);
            $table->string('is_delete')->default(0);
            $table->integer('admission_number')->nullable();
            $table->integer('roll_no')->nullable();
            $table->integer('Work_experience')->nullable();
            $table->integer('class_id')->nullable();
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('date_of_joining')->nullable();
            $table->string('religion')->nullable();
            $table->integer('mobile_number')->nullable();
            $table->date('admission_date')->nullable();
            $table->string('image')->nullable();
            $table->string('blood_group')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('occupation')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('qualification')->nullable();
            $table->text('address')->nullable();
            $table->text('note')->nullable();
            $table->text('permanent_address')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
