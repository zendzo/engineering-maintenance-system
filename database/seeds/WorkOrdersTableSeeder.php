<?php

use Illuminate\Database\Seeder;

class WorkOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\WorkOrder::class, 10)->create();

        $this->command->info('Work Order Fake Data Created!');
    }
}
