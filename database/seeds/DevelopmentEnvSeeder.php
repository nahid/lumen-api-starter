<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class DevelopmentEnvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        factory(User::class)->create(['email' => 'admin@local.dev']);
    }
}
