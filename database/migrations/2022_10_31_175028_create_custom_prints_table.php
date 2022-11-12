<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomPrintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_prints', function (Blueprint $table) {
            $table->id();
            $table->string("min");
            $table->string("max");
            $table->double("photo_premium_glossy");
            $table->double("canvas");
            $table->double("banner");
            $table->double("self_adhesive");
            $table->string("value")->nullable();
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
        Schema::dropIfExists('custom_prints');
    }
}
