<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            'Front Office Room',
            'Kitchen Kitchen Room',
            'Engineering Room'
        ];
        foreach ($locations as $location) {
            Location::create([
                'name' => $location
            ]);
        }
        $this->command->info('Location Fake Data Created !');
    }
}
