<?php

use App\Model\TaskPriority;
use Illuminate\Database\Seeder;

class TaskPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskPriority::truncate();

       TaskPriority::create([
           'name'        => 'High',
           'description' => 'high'
       ]);
       TaskPriority::create([
           'name'        => 'Medium',
           'description' => 'medium'
       ]);
       TaskPriority::create([
           'name'        => 'Low',
           'description' => 'low'
       ]);
    }
}
