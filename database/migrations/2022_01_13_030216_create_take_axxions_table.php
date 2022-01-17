<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakeAxxionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

       
        Schema::create('take_axxions_', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->enum('level',['basic','intermediate','advanced'])->default('basic');
            $table->integer('number_visits')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('title')->nullable();
            $table->longtext('short_description')->nullable();
            $table->text('img')->nullable();
            $table->longtext('body')->nullable();
            $table->text('video_1')->nullable();
            $table->text('video_2')->nullable();
            $table->text('podcast')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('take_axxions_');
    }
}
