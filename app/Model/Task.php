<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [

        'tittle', 'description', 'user_id', 'author_id', 'task_status_id', 'priority_id'
    ];

    public function author()
    {
        return $this->belongsTo(User::class,'author_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function status()
    {
        return $this->belongsTo(TaskStatus::class,'task_status_id');
    }

    public function priority()
    {
        return $this->belongsTo(TaskPriority::class,'priority_id');
    }
}
