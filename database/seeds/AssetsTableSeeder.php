<?php

use Illuminate\Database\Seeder;

class AssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Asset::class, 5)->create();

        $this->command->info('Successfully Created 5 Asset data!');
    }
}
