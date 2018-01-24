<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePendingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('owner');
            $table->string('affair');
            $table->string('status')->default('EN PROCESO');
            $table->date('end_date')->nullable();
            $table->integer('person_id')->unsigned();
			      $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pendings');
    }
}
