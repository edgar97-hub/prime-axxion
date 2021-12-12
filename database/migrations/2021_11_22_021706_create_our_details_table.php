<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateourdetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_details', function (Blueprint $table) {
            $table->id('id');
            $table->text('title')->nullable();
            $table->text('textcolumn1')->nullable();
            $table->text('textcolumn2')->nullable();
            $table->unsignedBigInteger('nosotros_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('nosotros_id')->references('id')->on('our_information')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('our_details');
    }
}
