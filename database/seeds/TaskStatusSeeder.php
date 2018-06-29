<?php

use App\Model\TaskStatus;
use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskStatus::truncate();

        TaskStatus::create([
            'name'        => 'Open',
            'description' => 'open'
        ]);

        TaskStatus::create([
            'name'        => 'In Progress',
            'description' => 'in_progress'
        ]);

        TaskStatus::create([
            'name'        => 'Closed',
            'description' => 'closed'
        ]);

        TaskStatus::create([
            'name'        => 'Resolved',
            'description' => 'resolved'
        ]);
    }
}
