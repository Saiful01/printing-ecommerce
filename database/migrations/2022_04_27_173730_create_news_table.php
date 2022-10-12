<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("slug")->nullable();
            $table->string("featured_image")->nullable();
            $table->longText("details")->nullable();
            $table->unsignedBigInteger("author_id")->nullable();
            $table->unsignedBigInteger("category_id")->nullable();
            $table->string("type")->default("news");//notice
            $table->boolean("is_active")->default(true);//notice
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
        Schema::dropIfExists('news');
    }
}
