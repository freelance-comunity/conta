<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTracingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracings', function (Blueprint $table) {
            $table->increments('id');
            $table->text('body');
            $table->string('people');
            $table->string('type');
            $table->string('fulfilled')->default('NO');
            $table->integer('pending_id')->unsigned();
            $table->foreign('pending_id')->references('id')->on('pendings')->onDelete('cascade');

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
        Schema::drop('tracings');
    }
}
