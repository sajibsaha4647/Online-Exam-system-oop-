$(document).ready(function () {
    //for user registration
    $("#submit").click(function (e) {
        e.preventDefault();
        let name = $("#name").val()
        let username = $("#username").val()
        let password = $("#password").val()
        let email = $("#email").val()
        let datastring = 'name=' + name + '&username=' + username + '&password=' + password + '&email=' + email;
        $.ajax({
            url: "ajaxphp/GetRegister.php",
            type: "POST",
            data: datastring,
            success: function (data) {
                $('#register').html(data);
                $('#name').html('input').val('')
                $('#username').html('input').val('')
                $('#password').html('input').val('')
                $('#email').html('input').val('')
            }
        })
    });

    //for update profile
    $("#proSubmit").click(function (e) {
        e.preventDefault();
        let name = $("#name").val()
        let username = $("#username").val()
        let datastring = 'name=' + name + '&username=' + username;
        $.ajax({
            url: "ajaxphp/GetupdateProfile.php",
            type: "POST",
            data: datastring,
            success: function (data) {
                $('#showprofilemsg').html(data);
            }
        })
    });



})

