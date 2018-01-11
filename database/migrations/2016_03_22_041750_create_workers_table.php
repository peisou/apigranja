<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('date_in');
            $table->date('date_out');
            $table->string('position');
            $table->string('email')->unique();
            //$table->smallInteger('state')->default('0');
            $table->text('reason_retirement')->nullable();
            $table->timestamps();
            
            //$table->sofDeletes();
        });
        //Schema::table('workers', function($table) {
          //  $table->foreign('dep_id')->references('id')->on('areas');//->onDelete('cascade');
        //});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workers');
    }
}
