<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameFieldTakeAxxionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('take_axxions', function (Blueprint $table) {
            $table->renameColumn('description', 'short_description');

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
          $table->renameColumn('short_description', 'description');
        });
    }
}
