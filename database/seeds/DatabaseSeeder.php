<?php

use Illuminate\Database\Seeder;
use App\Admin;
use App\About;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(Admin::class,1)->create();
        factory(About::class,1)->create();
    }
}
