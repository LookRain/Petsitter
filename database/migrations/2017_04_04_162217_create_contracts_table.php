<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('signed_under')->unique();
            $table->unsignedInteger('signed_under_post')->unique();

            $table->timestamp('contract_start_at');
            $table->timestamp('contract_end_at');

            $table->timestamps();

            $table->foreign('signed_under')->references('id')->on('bids')->onDelete('cascade');
            $table->foreign('signed_under_post')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
