<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('post_name');
            $table->string('slug');
            $table->mediumText('description');
            $table->string('yt_iframe');
            $table->string('meta_title');
            $table->mediumText('meta_description');
            $table->mediumText('meta_keyword');
            $table->tinyInteger('status');
            $table->integer('created_by');
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
        Schema::dropIfExists('post');
    }
};
