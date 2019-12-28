<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Calls method 'run()' for each one of the subclasses
     */
    public function run()
    {
        $this->call([
            StatesTableSeeder::class,
            CitiesTableSeeder::class,
            RolesAndUsersTableSeeder::class,
            CategoriesAndProductsTableSeeder::class,
            TicketTypesTableSeeder::class,
            TicketStatusTableSeeder::class,
            TicketsTableSeeder::class,
        ]);
    }
}
