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
        Schema::create('take_axxions', function (Blueprint $table) {
          $table->id('id');
          $table->string('img')->nullable();
          $table->text('title')->nullable();
          $table->text('description')->nullable();
          $table->timestamps();
          $table->softDeletes();

      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('take_axxions');
    }
}
