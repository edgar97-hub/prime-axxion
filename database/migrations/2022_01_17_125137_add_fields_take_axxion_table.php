<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddFieldsTakeAxxionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('take_axxions', function (Blueprint $table) {
          $table->unsignedBigInteger('category_id')->nullable();
          $table->enum('level',['basic','intermediate','advanced'])->default('basic');
          $table->integer('number_visits')->nullable();
          $table->unsignedBigInteger('user_id')->nullable();
          $table->longtext('body')->nullable();
          $table->text('video_1')->nullable();
          $table->text('video_2')->nullable();
          $table->text('podcast')->nullable();
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
          Schema::table('take_axxions', function (Blueprint $table) {
          $table->dropForeign(['category_id']);
          $table->dropColumn('category_id');
          $table->dropColumn('level');
          $table->dropColumn('number_visits');
          $table->dropForeign(['user_id']);
          $table->dropColumn('user_id');
          $table->dropColumn('body');
          $table->dropColumn('video_1');
          $table->dropColumn('video_2');
          $table->dropColumn('podcast');
        });
    }
}
