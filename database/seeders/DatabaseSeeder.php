<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
        $this->call(PermissionTableSeeder::class);
        $this->call(CreateAdminSeeder::class);
        $this->call(defaultsections::class);
        $this->call(BannersTableSeeder::class);
        $this->call(SolutionsTableSeeder::class);
        //$this->call(OurInformationTableSeeder::class);
        $this->call(OurDetailsTableSeeder::class);
        $this->call(OurImgTableSeeder::class);
        $this->call(CalltoActionsTableSeeder::class);
        $this->call(TakeAxxionsTableSeeder::class);
        $this->call(HelpsTableSeeder::class);
        Schema::enableForeignKeyConstraints();
    }
}
