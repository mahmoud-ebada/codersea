<?php

use Illuminate\Database\Seeder;

class CoderseaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // turncate companies and employees table
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('companies')->truncate();
        \DB::table('employees')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(App\Company::class,50)->create();
        factory(App\Employee::class,250)->create();
    }
}
