function cleanUp() {
    $('#firstName').css({ "border": "1px solid #ced4da", "background": "#fff" });
    $('#lastName').css({ "border": "1px solid #ced4da", "background": "#fff" });
    $('#userName').css({ "border": "1px solid #ced4da", "background": "#fff" });
    $('#email').css({ "border": "1px solid #ced4da", "background": "#fff" });
    $('#password').css({ "border": "1px solid #ced4da", "background": "#fff" });
    $('#Confirm_Password').css({ "border": "1px solid #ced4da", "background": "#fff" });
    $('#institution').css({ "border": "1px solid #ced4da", "background": "#fff" });

}
function emailValidation() {
    var email = document.getElementById("email").value;
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test(email)) {
        return false;
    } else {
        return true;
    }
}
function Passwordvalidation() {
    var password = document.getElementById("password").value;
    var password_Confirm = document.getElementById("Confirm_Password").value;
    if (password != password_Confirm) {
        return false;
    }
    else return true;
}
function emtpycheck() {
    var flag = true;

    var fname = document.getElementById("firstName").value;
    var lname = document.getElementById("lastName").value;
    var uname = document.getElementById("userName").value;
    var instiution = document.getElementById("institution").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var password_Confirm = document.getElementById("Confirm_Password").value;

    if (fname == '') {
        flag = false
        $('#firstName').css({ "border": "1px solid #f911119e", "background": "#ff050533" });

    }
    if (lname == '') {
        flag = false
        $('#lastName').css({ "border": "1px solid #f911119e", "background": "#ff050533" });
    }
    if (uname == '') {
        flag = false
        $('#userName').css({ "border": "1px solid #f911119e", "background": "#ff050533" });
    }
    if (instiution == '') {
        flag = false
        $('#email').css({ "border": "1px solid #f911119e", "background": "#ff050533" });
    }
    if (email == '') {
        flag = false
        $('#institution').css({ "border": "1px solid #f911119e", "background": "#ff050533" });
    }
    if (password == '') {
        flag = false
        $('#password').css({ "border": "1px solid #f911119e", "background": "#ff050533" });
    }
    if (password_Confirm == '') {
        flag = false
        $('#Confirm_Password').css({ "border": "1px solid #f911119e", "background": "#ff050533" });
    }
    return flag;
}

function teacher_signUp() {
    var fname = document.getElementById("firstName").value;
    var lname = document.getElementById("lastName").value;
    var uname = document.getElementById("userName").value;
    var instiution = document.getElementById("institution").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var password_Confirm = document.getElementById("Confirm_Password").value;

    var notEmpty = emtpycheck();
    if (notEmpty == true) {
        if (emailValidation()) {
            if (Passwordvalidation()) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    type: 'POST',
                    url: '/login-lms',
                    data: {
                        'first_name': fname,
                        'last_name': lname,
                        'user_name': uname,
                        'institution': instiution,
                        'email': email,
                        'password': password,
                        'type': "teacher",
                    },
                    success: function (data) {
                        document.getElementById("error_msg").innerHTML = data.msg;
                        $("#error_msg").slideDown(1000);
                        $("#error_msg").delay(3000).slideUp(1000);


                    },
                    error: function (data, textStatus, errorThrown) {
                        console.log("Error:".errorThrown);
                        console.log(data);


                    },
                })
            }
            else {
                $('#password').css({ "border": "1px solid #f911119e", "background": "#ff050533" });
                $('#Confirm_Password').css({ "border": "1px solid #f911119e", "background": "#ff050533" });
                $('#Error_msg').html("<h6 style='padding-top: 6px; color:white !important; align:center;'>Password doesn't match</h6>");
                $('#errorModel').modal('show');
            }
        } else {
            $('#email').css({ "border": "1px solid #f911119e", "background": "#ff050533" });
            $('#Error_msg').html("<h6 style='padding-top: 6px; color:white !important; align:center;'>Invaild Email Format</h6>");
            $('#errorModel').modal('show');
        }



    } else {
        $('#Error_msg').html("<h6 style='padding-top: 6px; color:white !important; align:center;'>Fill up all the information</h6>");
        $('#errorModel').modal('show');
    }




}
