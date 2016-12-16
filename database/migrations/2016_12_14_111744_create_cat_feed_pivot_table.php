<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatFeedPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_feed', function (Blueprint $table) {
            $table->integer('cat_id')->unsigned()->index();
            $table->foreign('cat_id')->references('id')->on('cats')->onDelete('cascade');
            $table->integer('feed_id')->unsigned()->index();
            $table->foreign('feed_id')->references('id')->on('feeds')->onDelete('cascade');
            $table->primary(['cat_id', 'feed_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cat_feed');
    }
}
