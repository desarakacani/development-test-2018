/**
 * Created by sara on 18-06-29.
 */
(function() {
    var table =  $('#taskTable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: APP_URL+'/tasks',
        columns : [
            {data: 'tittle', name: 'tittle'},
            {data: 'description', name: 'description'},
            { "data": function(data){
                return data.user ? data.user.firstname : 'N/A';
            }, name: "user.firstname"},
            { "data": function(data){
                return data.status ? data.status.name : 'N/A';
            }, name: "status.name"},
            { "data": function(data){
                return data.priority ? data.priority.name : 'N/A';
            }, name: "priority.name"},
            {data: function () {
                return '<a href="#" class="editTask"><i class="fa  fa-pencil fa-edit"></i></a>'
            }, orderable: false, searchable: false},
            {data: function () {
                return '<a href="#" class="showTask"><i class="fa fa-trash-o fa-eye"></i></a>'
            }, orderable: false, searchable: false}
        ],
        createdRow: function (row, data) {
            if (logged_user === parseInt(data.author_id)) {

                $(row).addClass("author");
            }
            else{
                $(row).addClass("user");
            }
        }
    });

    $('#taskTable tbody').on('click', 'a.editTask', function () {
        var rowId = $(this).parent().parent();
        var data = table.row(rowId).data();
        editTask(data);
    });

    $('#taskTable tbody').on('click', 'a.showTask', function () {
        var rowId = $(this).parent().parent();
        var data = table.row(rowId).data();
        showTask(data);
    });

}());

$(document).ready(function () {
    $("#storeTask").on("submit", function (event) {
        event.preventDefault();
        var data = $(this).serialize();
        storeFunction('storeTask',data,'/store','taskTable','post');
    });

    $("#updateTask").on("submit", function(event) {
        event.preventDefault();
        var id = $('#rowId').val();
        var data = $(this).serialize();
        storeFunction('updateTask',data,'/update/'+id,'taskTable','put');
    });

    $('#taskModal').on('hidden.bs.modal', function () {
        $('#user_id_update').attr('disabled',false);
        $('#priority_id_update').attr('disabled',false);
    })
});

//modal for task update
editTask = function (data) {
    $('#taskModal').modal('toggle');
    $('#rowId').val(data.id);
    $('#tittleUpdate').val(data.tittle);
    $('#descriptionUpdate').val(data.description);
    $('#user_id_update').val(data.user_id);
    $('#task_status_id_update').val(data.task_status_id);
    $('#priority_id_update').val(data.priority_id);
    if(logged_user !== parseInt(data.author_id))
    {
        $('#user_id_update').attr('disabled',true);
        $('#priority_id_update').attr('disabled',true);
    }
};

//modal for task update
showTask = function (data) {
    $('#showTaskModal').modal('toggle');
    $('#tittleShow').val(data.tittle);
    $('#descriptionShow').val(data.description);
    $('#user_id_show').val(data.user_id);
    $('#task_status_id_show').val(data.task_status_id);
    $('#priority_id_show').val(data.priority_id);
};



