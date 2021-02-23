<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->boolean('saturday');
            $table->time('saturday_from')->nullable();
            $table->time('saturday_to')->nullable();
            $table->integer('saturday_period', false, false)->nullable();
            $table->boolean('sunday');
            $table->time('sunday_from')->nullable();
            $table->time('sunday_to')->nullable();
            $table->integer('sunday_period', false, false)->nullable();
            $table->boolean('monday');
            $table->time('monday_from')->nullable();
            $table->time('monday_to')->nullable();
            $table->integer('monday_period', false, false)->nullable();
            $table->boolean('tuesday');
            $table->time('tuesday_from')->nullable();
            $table->time('tuesday_to')->nullable();
            $table->integer('tuesday_period', false, false)->nullable();
            $table->boolean('wednesday');
            $table->time('wednesday_from')->nullable();
            $table->time('wednesday_to')->nullable();
            $table->integer('wednesday_period', false, false)->nullable();
            $table->boolean('thursday');
            $table->time('thursday_from')->nullable();
            $table->time('thursday_to')->nullable();
            $table->integer('thursday_period', false, false)->nullable();
            $table->boolean('friday');
            $table->time('friday_from')->nullable();
            $table->time('friday_to')->nullable();
            $table->integer('friday_period', false, false)->nullable();
            $table->timestamps();

            $table->foreign('doctor_id')
                ->references('id')
                ->on('doctors')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
