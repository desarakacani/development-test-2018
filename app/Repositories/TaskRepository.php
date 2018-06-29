<?php
namespace App\Repositories;

use App\Mail\assignTaskMail;
use App\Model\Task;
use App\Model\TaskPriority;
use App\Model\TaskStatus;
use App\User;
use Illuminate\Support\Facades\Auth;

/**
 * Created by PhpStorm.
 * User: sara
 * Date: 18-06-29
 * Time: 9.52.PD
 */
class TaskRepository
{
    private $task;

    /**
     * TaskRepository constructor.
     * @param Task $task
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * @param $method
     * @param array $args
     * @return mixed
     */
    public function __call($method, $args = array())
    {
        return call_user_func_array(array($this->task, $method), $args);
    }

    public function getAllStatusesToArray()
    {
       $statuses = TaskStatus::get()->pluck('name', 'id')->toArray();
       return $statuses;
    }

    public function getAllPrioritiesToArray()
    {
        $priorities = TaskPriority::get()->pluck('name', 'id')->toArray();
        return $priorities;
    }

    public function getAllUsersToArray()
    {
        $users = User::get()->pluck('firstname', 'id')->toArray();
        return $users;
    }

    public function getUserTasks()
    {
        $userId = Auth::id();
          return  Task::with('user', 'status', 'priority')
                ->where('user_id', $userId)
                ->orWhere('author_id', $userId)
                ->get();
    }

    public function assignUserEmail($request)
    {
        $assignedUser = User::find($request->user_id);
        $content = [
            'message' => $request['tittle']
        ];
        \Mail::to($assignedUser->email)
            ->send(new assignTaskMail($content));
    }
}