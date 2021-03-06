<?php

use Illuminate\Database\Seeder;
use App\Models\Organization\Employees\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Profile::class, UserSeeder::FAKE_USERS)->create();
    }
}
