<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

//        Position::insert([
//            ['position' => 'Security'],
//            ['position' => 'Content manager'],
//            ['position' => 'Lawyer'],
//            ['position' => 'Designer'],
//        ]);
        Employee::factory(50)->create();
    }
}
