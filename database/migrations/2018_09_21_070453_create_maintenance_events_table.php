<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenanceEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->nullable()->default('text');
            $table->boolean('all_day')->nullable()->default(false);
            $table->date('start');
            $table->date('end');
            $table->string('background_color', 100)->nullable()->default('#1197C1');
            $table->integer('asset_id')->unsigned();
            $table->string('url', 100)->nullable();
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
        Schema::dropIfExists('maintenance_events');
    }
}
