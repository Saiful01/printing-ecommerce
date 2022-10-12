<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('department')->nullable();
            $table->string('photo')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('nid')->nullable();
            $table->string('dob')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('user_name')->nullable();
            $table->string('email_address')->nullable();
            $table->string('password')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linked')->nullable();
            $table->string('membership_type')->nullable();

            $table->boolean('is_member')->default(false);
            $table->boolean('is_active')->default(true);
            $table->rememberToken();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
