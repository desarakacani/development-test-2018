<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class TaskFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules =  [
            'tittle'            =>'required',
            'description'       =>'required',
            'user_id'           =>'required',
            'task_status_id'    =>'required',
            'priority_id'       =>'required',
        ];

        $route = Route::getCurrentRoute();
        if ($route->getName() == 'task.update') {
           $rules = [
               'tittleUpdate'            =>'required',
               'descriptionUpdate'       =>'required',
               'user_id_update'           =>'required',
               'task_status_id_update'    =>'required',
               'priority_id_update'       =>'required',
           ];
        }

        return $rules;
    }
}
