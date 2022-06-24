<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurImgTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_img', function (Blueprint $table) {
            $table->id('id');
            $table->text('textitle')->nullable();
            $table->string('img')->nullable();
            $table->unsignedBigInteger('our_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('our_id')->references('id')->on('our_information')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('our_img');
    }
}
