<?php

use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'Administrator (can create other users)',],
            ['id' => 2, 'title' => 'Manager IT',],
            ['id' => 3, 'title' => 'Staff IT',]
            // ['id' => 2, 'title' => 'Simple user',],
            // ['id' => 3, 'title' => 'Premium user', 'price' => 9.99, 'stripe_plan_id' => 'premium',],
        ];

        foreach ($items as $item) {
            \App\Role::create($item);
        }
    }
}
