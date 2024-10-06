$(document).ready(function () {

    $.validator.addMethod("validPassword", function (value, element) {
        return this.optional(element) || /^(?=.*[!@#$%^&*])(?=.*\d)(?=.*[A-Za-z]).{6,}$/.test(value);
    }, "Password must contain at least one letter, one number, and one special character.");

    $('#loginForm').validate({
        rules: { 
            email: {
                required: true, 
                email: true,
            },
            password: {
                required: true,
                minlength: 6,
                validPassword: true
            }
        },
        messages: { 
            email: {
                required: "Please enter a email",
                email: "Please enter valid email format"
            },
            password: {
                required: "Please enter a password",
                minlength: "Password must be at least 6 characters long",
                validPassword: "Password must contain at least one letter, one number, and one special character." 
            }, 
        },
        submitHandler: function (form) {
            $.ajax({
                type: "post",
                url: "model/login_model.php",
                data: $(form).serialize(),
                dataType: "json",
                success: function (response) {
                    if (response.status === true) { 
                        toastr.success(response.message);
                        setTimeout(() => {
                            window.location.href = 'home.php';
                        }, 2000);
                    }else{
                        toastr.error(response.message);
                    }
                }
            });
        }
    });
});
