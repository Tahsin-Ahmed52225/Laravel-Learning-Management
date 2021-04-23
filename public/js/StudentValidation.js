var fname = document.getElementById("Stu_firstName").value;
var lname = document.getElementById("Stu_lastName").value;
var uname = document.getElementById("Stu_userName").value;
var instiution = document.getElementById("Stu_institution").value;
var email = document.getElementById("Stu_email").value;
var password = document.getElementById("Stu_password").value;
var password_Confirm = document.getElementById("Stu_Confirm_Password").value;


function Stu_cleanUp() {
    $('#Stu_firstName').css({ "border": "1px solid #ced4da", "background": "#fff" });
    $('#Stu_lastName').css({ "border": "1px solid #ced4da", "background": "#fff" });
    $('#Stu_userName').css({ "border": "1px solid #ced4da", "background": "#fff" });
    $('#Stu_email').css({ "border": "1px solid #ced4da", "background": "#fff" });
    $('#Stu_password').css({ "border": "1px solid #ced4da", "background": "#fff" });
    $('#Stu_Confirm_Password').css({ "border": "1px solid #ced4da", "background": "#fff" });
    $('#Stu_institution').css({ "border": "1px solid #ced4da", "background": "#fff" });

}
function emailValidation2() {
    var email = document.getElementById("Stu_email").value;
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test(email)) {
        return false;
    } else {
        return true;
    }
}
function Passwordvalidation2() {
    var password = document.getElementById("Stu_password").value;
    var password_Confirm = document.getElementById("Stu_Confirm_Password").value;
    if (password != password_Confirm) {
        return false;
    }
    else return true;
}
function emtpycheck2() {
    var flag = true;

    var fname = document.getElementById("Stu_firstName").value;
    var lname = document.getElementById("Stu_lastName").value;
    var uname = document.getElementById("Stu_userName").value;
    var instiution = document.getElementById("Stu_institution").value;
    var email = document.getElementById("Stu_email").value;
    var password = document.getElementById("Stu_password").value;
    var password_Confirm = document.getElementById("Stu_Confirm_Password").value;

    if (fname == '') {
        flag = false
        $('#Stu_firstName').css({ "border": "1px solid #f911119e", "background": "#ff050533" });

    }
    if (lname == '') {
        flag = false
        $('#Stu_lastName').css({ "border": "1px solid #f911119e", "background": "#ff050533" });
    }
    if (uname == '') {
        flag = false
        $('#Stu_userName').css({ "border": "1px solid #f911119e", "background": "#ff050533" });
    }
    if (instiution == '') {
        flag = false
        $('#Stu_email').css({ "border": "1px solid #f911119e", "background": "#ff050533" });
    }
    if (email == '') {
        flag = false
        $('#Stu_institution').css({ "border": "1px solid #f911119e", "background": "#ff050533" });
    }
    if (password == '') {
        flag = false
        $('#Stu_password').css({ "border": "1px solid #f911119e", "background": "#ff050533" });
    }
    if (password_Confirm == '') {
        flag = false
        $('#Stu_Confirm_Password').css({ "border": "1px solid #f911119e", "background": "#ff050533" });
    }
    return flag;
}

function student_signUp() {
    var fname = document.getElementById("Stu_firstName").value;
    var lname = document.getElementById("Stu_lastName").value;
    var uname = document.getElementById("Stu_userName").value;
    var instiution = document.getElementById("Stu_institution").value;
    var email = document.getElementById("Stu_email").value;
    var password = document.getElementById("Stu_password").value;
    var password_Confirm = document.getElementById("Stu_Confirm_Password").value;

    var notEmpty = emtpycheck2();
    if (notEmpty == true) {
        if (emailValidation2()) {
            if (Passwordvalidation2()) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    type: 'POST',
                    url: '/login',
                    data: {
                        'first_name': fname,
                        'last_name': lname,
                        'user_name': uname,
                        'institution': instiution,
                        'email': email,
                        'password': password,
                        'type': "student",
                    },
                    success: function (data) {
                        document.getElementById("Stu_error_msg").innerHTML = data.msg;
                        $("#Stu_error_msg").slideDown(1000);
                        $("#Stu_error_msg").delay(3000).slideUp(1000);


                    },
                    error: function (data, textStatus, errorThrown) {
                        console.log("Error:".errorThrown);
                        console.log(data);


                    },
                })
            }
            else {
                $('#Stu_password').css({ "border": "1px solid #f911119e", "background": "#ff050533" });
                $('#Stu_Confirm_Password').css({ "border": "1px solid #f911119e", "background": "#ff050533" });
                $('#Error_msg').html("<h6 style='padding-top: 6px; color:white !important; align:center;'>Password doesn't match</h6>");
                $('#errorModel').modal('show');
            }
        } else {
            $('#Stu_email').css({ "border": "1px solid #f911119e", "background": "#ff050533" });
            $('#Error_msg').html("<h6 style='padding-top: 6px; color:white !important; align:center;'>Invaild Email Format</h6>");
            $('#errorModel').modal('show');
        }



    } else {
        $('#Error_msg').html("<h6 style='padding-top: 6px; color:white !important; align:center;'>Fill up all the information</h6>");
        $('#errorModel').modal('show');
    }




}
