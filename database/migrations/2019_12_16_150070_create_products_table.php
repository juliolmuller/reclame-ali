<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run migration
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50)->index();
            $table->string('description')->nullable();
            $table->float('weight')->unsigned()->nullable();
            $table->unsignedBigInteger('category_id');
            $table->char('utc', 12)->unique()->index();
            $table->char('ean', 13)->unique()->nullable()->index();
            $table->userstamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
        });
    }

    /**
     * Reverse migration
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
