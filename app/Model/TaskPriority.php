<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TaskPriority extends Model
{
    protected $fillable = [

        'name', 'description'
    ];

    public function task()
    {
        return $this->hasOne(Task::class,'priority_id');
    }
}
