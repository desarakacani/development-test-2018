<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    protected $fillable = [

        'name', 'description'
    ];

    public function task()
    {
        return $this->hasOne(Task::class,'task_status_id');
    }
}
