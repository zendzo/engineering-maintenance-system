<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenanceTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('maintenance_event_id')->unsigned();
            $table->string('task', 200)->nullable();
            $table->timestamps();
        });

        Schema::table('maintenance_tasks', function(Blueprint $table){
            $table->foreign('maintenance_event_id')->references('id')->on('maintenance_events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenance_tasks');
    }
}
