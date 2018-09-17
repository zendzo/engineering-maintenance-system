<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->date('finish_at')->nullable();
            $table->integer('priority')->nullable()->default(3);
            $table->integer('location_id')->nullable()->default(1);
            $table->integer('category_id')->nullable()->default(1);
            $table->string('job', 200);
            $table->integer('order_by');
            $table->integer('follow_up')->default(1);
            $table->integer('departement_id')->default(1);
            $table->integer('status')->default(1);
            $table->string('photo', 200)->nullable();
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
        Schema::dropIfExists('work_orders');
    }
}
