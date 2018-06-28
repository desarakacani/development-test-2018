<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\Task;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'email', 'password', 'firstname', 'lastname', 'contact_number', 'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function author_tasks(){
        return $this->hasMany(Task::class,'author_id');
    }

    public function user_tasks()
    {
        return $this->hasMany(Task::class,'user_id');
    }
}
