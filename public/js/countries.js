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
                text: "<i class='feather icon-plus'></i>ADD COUNTRY OF OPERATION",
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



})


$(document).ready(function(){
    //Store Vendor Incentives
    $('.btn-save-country').on('click', function () {
        var ct_id = $('#ct-id').val();
        var ct_name = $('#ct-name').val();
        var ct_desc = $('#ct-desc').val();
        var ct_status = $('#ct-status').val();
        var token = $('#user_token').val();
        var vendor = $('#vendor').val();


        let name_l = ct_name.trim().length


        if (name_l <= 0) {
            toastr.error(`County name cannot be null:`, 'Creation Failed', { "closeButton": true, "progressBar": true });
            return;
        }

        let button = $(this);
        $.blockUI();
        button.prop("disabled", true);
        toast = toastr.info('Please wait as the country is loaded..', 'Posting', { closeButton: true, progressBar: true, timeOut: "50000" });
        $.post({
            url: '/country/store',
            data: {
                ct_id: ct_id,
                ct_name: ct_name,
                ct_status: ct_status,
                ct_desc: ct_desc,
                _token: token,
                vendor: vendor
            },
            success: function (result) {
                toastr.clear(toast);
                toastr.success(result.message, 'Departments', { "closeButton": true, "progressBar": true, timeOut: "50000" });
                window.location.href = `/countries`;
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




})

function updateUser(country) {

    console.log(country)

    $("#status-field").attr('hidden', false);

    $("#ct-id").val(country.ct_id);
    $("#ct-name").val(country.ct_name);
    $("#ct-desc").val(country.ct_desc);
    $("#ct-status").val(country.ct_status);

   $.showModal($('#add-dist-modal'));

   $(".overlay-bg").addClass("show");
   $("#donor-idnt").val(0);



}
