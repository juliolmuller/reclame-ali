<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run migration
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('name', 80)->index();
            $table->integer('state_id')->index();
            $table->timestamps();

            $table->primary('id');

            $table->foreign('state_id')
                ->references('id')
                ->on('states');
        });
    }

    /**
     * Reverse migration
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
