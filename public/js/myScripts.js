/**
 * Created by sara on 18-06-29.
 */

storeFunction = function (formId, data, url, tableId, method) {
    console.log(formId)
    $('#' + formId + ' *').filter(':input').each(function () {
        var name = $(this).attr('name');
        $("[name=" + name + "]").nextAll('span.text-danger').remove();
    });
    $.ajax({
        url: APP_URL + url,
        type: method,
        data: data,
        beforeSend: function () {
            $.LoadingOverlay("show");
        },
        success: function (d) {

            if (method !== 'put' && formId !== undefined) {
                $('#' + formId + '').each(function () {
                    this.reset();
                });
            }

            $.LoadingOverlay("hide");

            if (tableId !== undefined) {
                $('#' + tableId + '').DataTable().ajax.reload();
            }

            toastr["success"](d.message)
        },
        error: function (d) {
            $.LoadingOverlay("hide");
            var json = d.responseJSON;
            $(json.errors).each(function (i, val) {
                $.each(val, function (k, v) {
                    $('#' + formId + ' *').filter(':input').each(function () {
                        var name = $(this).attr('name');
                        if (k === $(this).attr('name')) {
                            var html = '<span class="text text-danger" >' + v + '</span>';
                            $(html).insertAfter($("[name=" + name + "]"));
                        }
                    });
                });
            });
        }
    });
};
