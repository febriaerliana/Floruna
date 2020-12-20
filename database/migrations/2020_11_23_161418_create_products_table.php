<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('type')->comment('0 flora; 1 fauna');
            $table->string('name');
            $table->text('species');
            $table->text('latin_name');
            $table->string('color');
            $table->text('characteristic');
            $table->text('habitat');
            $table->text('shape');
            $table->integer('total');
            $table->string('status');
            $table->text('img');
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
        Schema::dropIfExists('products');
    }
}
