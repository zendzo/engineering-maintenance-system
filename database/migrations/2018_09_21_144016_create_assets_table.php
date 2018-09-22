<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('photo')->nullable();
            $table->integer('category_id');
            $table->integer('location_id');
            $table->string('property');
            $table->string('merk');
            $table->string('model')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('capacity')->nullable();
            $table->date('purcashed_at')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('assets');
    }
}
