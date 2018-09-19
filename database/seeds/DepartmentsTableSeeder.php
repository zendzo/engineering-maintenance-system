<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            'Engineering',
            'Kitchen'
        ];
        foreach ($departments as $department) {
            Department::create([
                'name' => $department,
            ]);
        }
        $this->command->info('Department Data Created !');
    }
}
