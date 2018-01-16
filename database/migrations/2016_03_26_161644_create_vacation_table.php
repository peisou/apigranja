<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateVacationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('date_from');
            $table->date('date_to');
            $table->string('observations');
            $table->integer('aceptado');
            $table->integer('worker_id')->unsigned();
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade');
            $table->timestamps();
            //$table->SofDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacations');
    }
}
