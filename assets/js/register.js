$(document).ready(function () {
    $.validator.addMethod("validPassword", function (value, element) {
        return this.optional(element) || /^(?=.*[!@#$%^&*])(?=.*\d)(?=.*[A-Za-z]).{6,}$/.test(value);
    }, "Password must contain at least one letter, one number, and one special character.");

    $('#registerForm').validate({
        rules: {
            user_name: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 6,
                validPassword: true
            },
            confirm_password: {
                required: true,
                minlength: 6,
                equalTo: '#password'
            }
        },
        messages: {
            user_name: {
                required: "Please enter a username",
                minlength: "Username must be at least 3 characters long"
            },
            email: {
                required: "Please enter a email",
                email: "Please enter valid email format"
            },
            password: {
                required: "Please enter a password",
                minlength: "Password must be at least 6 characters long",
                pattern: "Password must contain at least one letter, one number, and one special character."
            },
            confirm_password: {
                required: "Please confirm your password",
                minlength: "Password must be at least 6 characters long",
                equalTo: "Passwords do not match"
            }
        },
        submitHandler: function (form) {
            $.ajax({
                type: "post",
                url: "model/register_model.php",
                data: $(form).serialize(),
                dataType: "json",
                success: function (response) {
                    if (response.status === true) {
                        toastr.success(response.message);
                        setTimeout(() => {
                            window.location.href = 'login.php';
                        }, 2000); 
                    }else{
                        toastr.error(response.message);
                    }
                }
            });
        }
    });
});
