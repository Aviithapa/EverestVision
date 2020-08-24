<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->default('');
            $table->string('slug')->nullable()->default('');
            $table->integer('display_order')->nullable()->default(0);
            $table->text('excerpt')->nullable();
            $table->string('url')->nullable()->default('');
            $table->text('content')->nullable();
            $table->string('image')->nullable()->default('');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->foreign('parent_id')
                ->references('id')->on('menus')->onUpdate('cascade')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('disciplines');
    }
}
