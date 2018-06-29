@extends('layout.master')

@section('content')
    <div class="container padding-bottom-50">
        <form  method="post" id="storeTask">
            @csrf
            <h3>Create task</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Tittle</label>
                        <input type="text" class="form-control" name="tittle" id="tittle" placeholder="Tittle">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Description">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">User</label>
                        {!! Form::select('user_id', ['' => 'Select...'] + $users, null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        {!! Form::select('task_status_id', ['' => 'Select...'] + $statuses, null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Priority</label>
                        {!! Form::select('priority_id', ['' => 'Select...'] + $priorities, null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
                <div class="float-right">
                    <button class="btn btn-success" type="submit">Save</button>
                    <button class="btn btn-primary" type="reset">Reset</button>
                </div>
        </form>
    </div>

    <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Tasks
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="taskTable" width="100%"
                                       cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                       style="width: 100%;">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 247px;">
                                            Tittle
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 379px;">Description
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 191px;">User
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Age: activate to sort column ascending"
                                            style="width: 92px;">Status
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Age: activate to sort column ascending"
                                            style="width: 92px;">Priority
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Age: activate to sort column ascending"
                                            style="width: 92px;">Edit
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Age: activate to sort column ascending"
                                            style="width: 92px;">View
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    <!-- MODAL FOR EDIT TASK -->
    <div class="modal fade modal-size-large modal-expiration" id="taskModal" tabindex="-1" role="dialog"
         aria-labelledby=""
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" id="updateTask">
                <div class="modal-body">

                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Tittle</label>
                                    <input type="text" class="form-control" name="tittleUpdate" id="tittleUpdate" placeholder="Tittle">
                                    <input type="hidden" id="rowId">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Description</label>
                                    <input type="text" class="form-control" name="descriptionUpdate" id="descriptionUpdate" placeholder="Description">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">User</label>
                                    {!! Form::select('user_id_update', ['' => 'Select...'] + $users, null, ['class' => 'form-control', 'id'=>'user_id_update']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Status</label>
                                    {!! Form::select('task_status_id_update', ['' => 'Select...'] + $statuses, null, ['class' => 'form-control', 'id'=>'task_status_id_update']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Priority</label>
                                    {!! Form::select('priority_id_update', ['' => 'Select...'] + $priorities, null, ['class' => 'form-control', 'id'=>'priority_id_update']) !!}
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit" href="">Save</button>
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END MODAL FOR EDIT TASK -->

    <!-- MODAL FOR SHOW TASK -->
    <div class="modal fade modal-size-large modal-expiration" id="showTaskModal" tabindex="-1" role="dialog"
         aria-labelledby=""
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Show Task</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Tittle</label>
                                    <input type="text" class="form-control" name="tittleUpdate" id="tittleShow" placeholder="Tittle" readonly="">
                                    <input type="hidden" id="rowId">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Description</label>
                                    <input type="text" class="form-control" name="descriptionUpdate" id="descriptionShow" placeholder="Description" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">User</label>
                                    {!! Form::select('user_id_update', ['' => 'Select...'] + $users, null, ['class' => 'form-control', 'id'=>'user_id_show', 'disabled']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Status</label>
                                    {!! Form::select('task_status_id_update', ['' => 'Select...'] + $statuses, null, ['class' => 'form-control', 'id'=>'task_status_id_show', 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Priority</label>
                                    {!! Form::select('priority_id_update', ['' => 'Select...'] + $priorities, null, ['class' => 'form-control', 'id'=>'priority_id_show', 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL FOR SHOW TASK -->

@endsection