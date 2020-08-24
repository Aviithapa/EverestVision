<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable()->default('');
            $table->string('nepali_title')->nullable()->default('');
            $table->text('content')->nullable();
            $table->text('nepali_content')->nullable();
            $table->string('excerpt')->nullable()->default('');
            $table->text('nepali_excerpt')->nullable()->default('');
            $table->string('template_page')->nullable()->default('');
            $table->string('icon')->nullable()->default('');
            $table->text('meta_data')->nullable();
            $table->text('link')->nullable();
            $table->text('template_data')->nullable();
            $table->integer('image_id')->unsigned()->nullable();
            $table->foreign('image_id')
                ->references('id')->on('files')->onUpdate('cascade')->onDelete('cascade');
            $table->string('logo_image')->nullable()->default('');

            $table->enum('type',['homepage_banner','testimonial','content','news','school_partner','recruiter_partner','student_partner','steps','services','packages','courses','teacher','pages','tender','gallery','features','career','category'])->nullable();
            $table->string('slug')->unique();
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
        Schema::dropIfExists('posts');
    }
}
