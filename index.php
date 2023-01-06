<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <title>DoorProfit</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" id="form">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" pattern=".{3,}" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <button type="submit" name="submit" id="submit">Submit</button>

        </form>
    </div>
</body>
</html>
<script>
$(document).ready(function(){
    $("#form").submit(function(event) {
        event.preventDefault();

        var username = $("#username").val();
        var password = $("#password").val();
        var passwordReg = /^(?=[a-zA-Z])(?=.*\d)[A-Za-z\d]{8,16}$/;
        if ( !passwordReg.test( password )){
            event.preventDefault();
            alert('Please insert valid password containing letters and numbers between 7 and 16 characters!');
            return false;
        }
        var email = $("#email").val();
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if ( !emailReg.test( email ) ) {
            event.preventDefault();
            alert('Please enter valid email');
            return false;
        }

        $.ajax({
            type: "POST",
            url: "script.php",
            data: {
                type: "checkDuplicate",
                username: username,
                password: password,
                email: email 
            }
        })
            .done(function(response){
                if(response == '') {
                    $.ajax({
                        type: "POST",
                        url: "script.php",
                        data: {
                            type: "insertUser",
                            username: username,
                            password: password,
                            email: email 
                        }
                    })
                    .done(function(response){
                        alert("The signup was successful");
                        location.reload();
                    })
                    .fail(function(xhr, status, error){
                        alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                        event.preventDefault();
                    });
                } else {
                    alert('Username taken!');
                }
            })
            .fail(function(xhr, status, error){
                alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                event.preventDefault();
            });
    });
});
</script>
