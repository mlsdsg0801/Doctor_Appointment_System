<?php ?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-signin-client_id" content="844826488344-jp9erokv3n9uh356guas22v6hce6gflh.apps.googleusercontent.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/patient_side_css/login_form_patient.css">
    <link rel="icon" type="image/png" href="../images/website icon.png">
    <    <title>Login Using Google Account</title>
</head>
<body>
<h2 class = "alert alert-primary" >Signup using Google Account</h2>
    <div class="g-signin2" data-onsuccess="onSignIn"></div>

    <div class = "data">
        <p>NAME: </p>
        <p id = "name" class = "alert alert-success"></p>
        <p>PROFILE PIC</p>
        <img id = "id" class = "rounded-circle" width = "100" height = "100">
        <p>EMAIL: </p>
        <p id = "email"></p>
        <button type="button" class = "btn btn-danger" onclick="signout();">SIGN OUT</button>
    </div>
    
    <script src = "testing api.js" ></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <button onclick = "location.href = '/patient_side/home_page.php'">Sign In</button>


      

</body>
</html>
