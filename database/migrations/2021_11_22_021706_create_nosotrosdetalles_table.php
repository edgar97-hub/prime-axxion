<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNosotrosdetallesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nosotrosdetalles', function (Blueprint $table) {
            $table->id('id');
            $table->string('title')->nullable();
            $table->string('textcolumn1')->nullable();
            $table->string('textcolumn2')->nullable();
            $table->string('textitle')->nullable();
            $table->string('img')->nullable();
            $table->unsignedBigInteger('nosotros_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('nosotros_id')->references('id')->on('nosotros')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nosotrosdetalles');
    }
}
