
<?php
session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:Login.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h1{
            text-align: center;
            text-transform: uppercase;
    font-family: 'Roboto', sans-serif;
    font-weight: 900;
        }
    </style>
</head>


<body>



<a style="float: right" class="logout-e" href="Logout.php">LOG OUT</a>

<?php
include "chatBar.php";
?>

<h1>Welcome , <?php echo  $_SESSION["username"]?></h1>


</body>
</html>