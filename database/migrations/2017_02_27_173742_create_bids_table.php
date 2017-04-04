<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('posted_under')->unsigned();
            //$table->integer('bidded_by')->unsigned();
            $table->integer('pet_on_bid')->unsigned();
            $table->timestamp('start_at');
            $table->timestamp('end_at');
            $table->double('bid_price', 15, 8)->unsigned();
            $table->text('bid_message')->nullable();
            $table->timestamps();

            $table->foreign('posted_under')->references('id')->on('posts')->onDelete('cascade');
            //$table->foreign('bidded_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pet_on_bid')->references('id')->on('pets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bids');
    }
}
