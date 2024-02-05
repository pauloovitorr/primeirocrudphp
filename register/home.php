<?php 

session_start();

if(isset($_SESSION['email']) && !empty($_SESSION['email']))
{
    echo $_SESSION['email'];
}
else
{
    unset($_SESSION['email']);
    header('Location:'.'../index.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>oi</h1>
</body>
</html>