<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->integer('cat_id');
            $table->integer('subcat_id')->nullable();
            $table->string('name')->nullable();
            $table->string('location');
            $table->string('date');
            $table->string('tags');
            $table->string('title');
            $table->string('image');
            $table->integer('latest_news')->nullable();
            $table->integer('sports')->nullable();
            $table->text('long_description');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('articles');
    }
}
