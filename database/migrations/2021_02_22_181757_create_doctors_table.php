<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->text('specialization');
            $table->text('address');
            $table->decimal('price')->default(0);
            $table->string('photo')->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            $table->boolean('saturday')->default(false);
            $table->time('saturday_from')->nullable();
            $table->time('saturday_to')->nullable();
            $table->integer('saturday_period', false, false)->nullable();
            $table->boolean('sunday')->default(false);
            $table->time('sunday_from')->nullable();
            $table->time('sunday_to')->nullable();
            $table->integer('sunday_period', false, false)->nullable();
            $table->boolean('monday')->default(false);
            $table->time('monday_from')->nullable();
            $table->time('monday_to')->nullable();
            $table->integer('monday_period', false, false)->nullable();
            $table->boolean('tuesday')->default(false);
            $table->time('tuesday_from')->nullable();
            $table->time('tuesday_to')->nullable();
            $table->integer('tuesday_period', false, false)->nullable();
            $table->boolean('wednesday')->default(false);
            $table->time('wednesday_from')->nullable();
            $table->time('wednesday_to')->nullable();
            $table->integer('wednesday_period', false, false)->nullable();
            $table->boolean('thursday')->default(false);
            $table->time('thursday_from')->nullable();
            $table->time('thursday_to')->nullable();
            $table->integer('thursday_period', false, false)->nullable();
            $table->boolean('friday')->default(false);
            $table->time('friday_from')->nullable();
            $table->time('friday_to')->nullable();
            $table->integer('friday_period', false, false)->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
