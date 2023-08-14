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
                text: "<i class='feather icon-plus'></i>ADD COMPANY DETAILS",
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
    $('.btn-save-company').on('click', function () {
        var cp_id = $('#cp-id').val();
        var cp_name = $('#cp-name').val();
        var cp_address = $('#cp-address').val();
        var cp_country = $('#cp-country').val();
        var cp_status = $('#cp-status').val();
        var token = $('#user_token').val();
        var vendor = $('#vendor').val();


        let name_l = cp_name.trim().length
        let address_l = cp_address.trim().length
       // let country_l = cp_country.trim().length




        if (name_l <= 0) {
            toastr.error(`Company name cannot be null:`, 'Creation Failed', { "closeButton": true, "progressBar": true });
            return;
        }

        else if (address_l <= 0) {
            toastr.error(`Company location address cannot be null:`, 'Creation Failed', { "closeButton": true, "progressBar": true });
            return;
        }

        // else if (country_l <= 0) {
        //     toastr.error(`Company country of operation cannot be null:`, 'Creation Failed', { "closeButton": true, "progressBar": true });
        //     return;
        // }

        let button = $(this);
        $.blockUI();
        button.prop("disabled", true);
        toast = toastr.info('Please wait as the company is loaded..', 'Posting', { closeButton: true, progressBar: true, timeOut: "50000" });
        $.post({
            url: '/company/store',
            data: {
                cp_id: cp_id,
                cp_name: cp_name,
                cp_status: cp_status,
                cp_address: cp_address,
                cp_country: cp_country,
                _token: token,
                vendor: vendor
            },
            success: function (result) {
                toastr.clear(toast);
                toastr.success(result.message, 'Company', { "closeButton": true, "progressBar": true, timeOut: "50000" });
                window.location.href = `/companies`;
            },
            error: function (xhr, ajaxOptions, thrownError) {
                toastr.clear(toast);
                toastr.error(`Failed to create company. ${xhr.responseJSON?.message ?? ""}`, 'Company', { "closeButton": true, "progressBar": true });
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

    $("#cp-id").val(country.cp_id);
    $('#cp-country').val(country.cp_country);
    $("#cp-name").val(country.cp_name);
    $("#cp-address").val(country.cp_address);
    $("#cp-status").val(country.cp_status);

   $.showModal($('#add-dist-modal'));

   $(".overlay-bg").addClass("show");
   $("#donor-idnt").val(0);



}
