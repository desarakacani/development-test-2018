<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskFormRequest;
use App\Repositories\TaskRepository;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class TaskController extends Controller
{
    private $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository=$taskRepository;
    }

    public function index()
    {
        $statuses = $this->taskRepository->getAllStatusesToArray();
        $priorities = $this->taskRepository->getAllPrioritiesToArray();
        $users = $this->taskRepository->getAllUsersToArray();
        return view('tasks.index')
            ->with('statuses', $statuses)
            ->with('priorities', $priorities)
            ->with('users', $users);
    }

    public function store(TaskFormRequest $request)
    {
        $userId = Auth::id();
        $inputs =  $request->all();
        $inputs['author_id'] = $userId;
        $this->taskRepository->create($inputs);
        $this->taskRepository->assignUserEmail($request);
        return response()
            ->json([
                'message' => 'Task created successfully!',
                'status' => 200
            ], 200);
    }

    public function update(TaskFormRequest $request,$id)
    {
        $inputs =  $request->all();
        $task = $this->taskRepository->find($id);
        $task->update([
            'title'             => $inputs['tittleUpdate'],
            'description'       => $inputs['descriptionUpdate'],
            'user_id'           => $inputs['user_id_update'],
            'task_status_id'    => $inputs['task_status_id_update'],
            'priority_id'       => $inputs['priority_id_update']
        ]);
        return response()
            ->json([
                'message' => 'Task updated successfully!',
                'status' => 200
            ], 200);
    }

    public function tasks()
    {
        $tasks =$this->taskRepository->getUserTasks();
        return Datatables::of($tasks)->make(true);
    }
}
