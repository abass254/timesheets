$(document).ready(function(){


    $('.btn-login-user').on('click', function () {


        var username = $('#username').val();
        var password = $('#password').val();
        var token = $('#token').val();
        var button = $(this);

      //  var total = parseInt(proj) + parseInt(train) + parseInt(cert);






        if (username.trim().length < 1) {
            toastr.error(`Please provide the username/email`, 'Creation Failed', { "closeButton": true, "progressBar": true });
            return;
        }
        else if (password.trim().length < 1) {
            toastr.error(`Please provide the password`, 'Creation Failed', { "closeButton": true, "progressBar": true });
            return;
        }

        $.post({
            url: '/login-post',
            data: {
                _token: token,
                email: username,
                password: password
            },

            beforeSend: function () {
                toast = toastr.info('Please wait as we process your information...', 'Login Page', { closeButton: true, progressBar: true, timeOut: "10000" });
                button.prop("disabled", true);
            },
            success: function (result) {
                if (result.code == 401) {
                    toastr.clear(toast);
                    toastr.error(result.message, 'Login Failed', { closeButton: true, progressBar: true, timeOut: "30000" });
                }

                else if (result.code == 404) {
                    toastr.clear(toast);
                    toastr.error(result.message, 'Login Failed', { closeButton: true, progressBar: true, timeOut: "30000" });
                }

                else if(result.code == 200) {
                    toastr.clear(toast);
                    toastr.success(result.message, 'Login Success', { closeButton: true, progressBar: true, timeOut: "30000" });
                    window.location.href = `/dashboard`;
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                toastr.clear(toast);
                toastr.error(`Failed to . ${xhr.responseJSON?.message ?? ""}`, 'Update Failed', { "closeButton": true, "progressBar": true });
            },
            complete: function () {
                button.prop("disabled", false);
            }
        });
    });
});
