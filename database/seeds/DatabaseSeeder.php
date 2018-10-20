<?php

use App\Tenant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Tenant::create([
        	'name' => 'cliente1'
        ]);

        Tenant::create([
        	'name' => 'cliente2'
        ]);
    }
}
