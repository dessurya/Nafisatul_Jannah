<?php
    if(session_id() == '') { session_start(); }
    unset($_SESSION['userLog']);
    session_unset();
    // session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Logout</title>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
</head>
<body class="pt-2 pb-2">
    <script>
        alert('terimakasih telah logout')
        window.location.href = "admin-login.php";
    </script>
</body>
</html>