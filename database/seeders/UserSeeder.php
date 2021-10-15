<?php

namespace Database\Seeders;

use Domain\Order\Models\Order;
use Domain\User\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->has(
            Order::factory()->count(2)
        )->count(4)->create();
    }
}