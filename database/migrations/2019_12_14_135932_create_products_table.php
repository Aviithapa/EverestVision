<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name')->nullable()->default('');
            $table->string('slug')->nullable()->default('');
            $table->string('type')->nullable()->default('');
            $table->text('content')->nullable();
            $table->integer('display_order')->nullable()->default(0);
            $table->integer('price')->nullable()->default(0);
            $table->integer('discount')->nullable()->default();
            $table->integer('quantity')->nullable()->default(0);
            $table->string('image')->nullable()->default('');
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
