<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::unprepared('CREATE TRIGGER bid_notification AFTER INSERT ON `bids` FOR EACH ROW 
        BEGIN
            INSERT INTO `notifications`(`bid_id`, `post_id`) VALUES (NEW.id, NEW.posted_under);
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::unprepared('DROP TRIGGER `bid_notification`');
    }
}
