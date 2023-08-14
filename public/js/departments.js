$(document).ready(function () {
    "use strict"
    // init list view datatable
    $.blockUI();
    setTimeout(function () {
        $.unblockUI();
    }, 1000);
    var dataListView = $(".data-list-view").DataTable({
        responsive: false,
        columnDefs: [
            {
                orderable: true,
                targets: 0
            }
        ],
        dom:
            '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actons">p>',
        oLanguage: {
            sLengthMenu: "_MENU_",
            sSearch: ""
        },
        aLengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
        select: {
            style: "multi"
        },
        order: [[0, "asc"]],
        bInfo: false,
        pageLength: 10,
        buttons: [
            {
                text: "<i class='feather icon-plus'></i>ADD A DEPARTMENT",
                action: function () {
                    $.showModal($('#add-dist-modal'));
                },
                className: "btn-outline-danger"
            }
        ],
        initComplete: function (settings, json) {
            $(".dt-buttons .btn").removeClass("btn-secondary")
        }
    });

    dataListView.on('draw.dt', function () {
        setTimeout(function () {
            if (navigator.userAgent.indexOf("Mac OS X") != -1) {
                $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
            }
        }, 50);
    });

    // To append actions dropdown before add new button
    var actionDropdown = $(".actions-dropodown")
    actionDropdown.insertBefore($(".top .actions .dt-buttons"))

    // Scrollbar
    if ($(".data-items").length > 0) {
        new PerfectScrollbar(".data-items", { wheelPropagation: false })
    }

    // Links on Checkboxes
    $('.product-name').on("click", function (e) {
        e.stopPropagation();
    });

    // On Edit
    $('.action-edit').on("click", function (e) {
        e.stopPropagation();
        BeginEdit(jq(this).data('uuid'));
    });

    // On Delete
    $('.action-delete').on("click", function (e) {
        e.stopPropagation();
        $(this).closest('td').parent('tr').fadeOut();
    });

    // mac chrome checkbox fix
    if (navigator.userAgent.indexOf("Mac OS X") != -1) {
        $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox");
    }

    $(".app-main .app-main__outer").css("z-index", 'unset');
    //$(".fixed-sidebar .app-main .app-main__outer").css("z-index", 'unset');

    jq('a.dropdown-item.dt-dropdown-action.dt-action-edit').click(function () {
        if (jq('td input.dt-checkboxes:checked').length != 1) {
            toastr.error('Action applicable to only one selectable Product', 'Edit Failed', { "closeButton": true, "progressBar": true });
            return;
        }
        BeginEdit(jq('td input.dt-checkboxes:checked').closest('td').data('uuid'));
    });

    jq('a.dropdown-item.dt-dropdown-action.dt-action-view').click(function () {
        if (jq('td input.dt-checkboxes:checked').length != 1) {
            toastr.error('Action applicable to only one selectable Product', 'Edit Failed', { "closeButton": true, "progressBar": true });
            return;
        }
        window.location.href = "/inventory/trucks/view?u=" + jq('td input.dt-checkboxes:checked').closest('td').data('uuid');
    });


    $('input[name=dp_status]').change(function () {
        alert('11');
        return;
        var mode = $(this).prop('checked');
        var id = $(this).val();
        var token = $('#token').val();

        $.ajax({
            url: "/department/update_status",
            type: "POST",
            data: {
                _token: token,
                mode: mode,
                id: id,
            },
            success: function (response) {
                toastr.success('Success!', response.msg);
            }

        });
    });
})

function BeginEdit(uuid) {
    window.location.href = "/inventory/trucks/edit?u=" + uuid;
}

$(document).ready(function(){
    //Store Vendor Incentives
    $('.btn-save-dept').on('click', function () {
        var dp_id = $('#dp-id').val();
        var dp_name = $('#dp-name').val();
        var dp_desc = $('#dp-desc').val();
        var dp_status = $('#dp-status').val();
        var token = $('#user_token').val();
        var vendor = $('#vendor').val();


        let name_l = dp_name.trim().length


        if (name_l <= 0) {
            toastr.error(`Distributors name cannot be null:`, 'Creation Failed', { "closeButton": true, "progressBar": true });
            return;
        }

        let button = $(this);
        $.blockUI();
        button.prop("disabled", true);
        toast = toastr.info('Please wait as the department is loaded..', 'Posting', { closeButton: true, progressBar: true, timeOut: "50000" });
        $.post({
            url: '/department/store',
            data: {
                dp_id: dp_id,
                dp_name: dp_name,
                dp_status: dp_status,
                dp_desc: dp_desc,
                _token: token,
                vendor: vendor
            },
            success: function (result) {
                toastr.clear(toast);
                toastr.success(result.message, 'Departments', { "closeButton": true, "progressBar": true, timeOut: "50000" });
                window.location.href = `/departments`;
            },
            error: function (xhr, ajaxOptions, thrownError) {
                toastr.clear(toast);
                toastr.error(`Failed to create department. ${xhr.responseJSON?.message ?? ""}`, 'Departments', { "closeButton": true, "progressBar": true });
            },
            complete: function () {
                button.prop("disabled", false);
                $.unblockUI();
            }
        });
    })


    // $('.btn-edit-dist').on('click', function () {

    //     GetDistributor($('td').closest('tr').data('id'));
    // })




})

function updateUser(department) {

    console.log(department)

    $("#status-field").attr('hidden', false);

    $("#dp-id").val(department.dp_id);
    $("#dp-name").val(department.dp_name);
    $("#dp-desc").val(department.dp_desc);
    $("#dp-status").val(department.dp_status);

   $.showModal($('#add-dist-modal'));

   $(".overlay-bg").addClass("show");
   $("#donor-idnt").val(0);



}
