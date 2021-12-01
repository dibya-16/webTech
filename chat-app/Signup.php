
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <script src="js/signup-action.js"></script>


    <title>Document</title>
</head>

<body >
<?php
include "Signup_action.php";
?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" onsubmit="return isValid()" name="SForm">

<div class="signup">    
    <h1 style="color: white;">Signup Page</h1><br>  
        <label for="email"> Email  :</label>
        <input type="email" id="email" name="email" value="<?php echo $email;  ?>">
        <span id="emailjsE" style="color: red;"> * <?php echo $emailEr;  ?></span>
        <br>

        <label for="userName">User Name:</label>
        <input type="text" id="Uname" name="username">
        <span id="usernamejsE" style="color: red;"> * <?php echo $User_NameEr;  ?></span>
        <br>
        <label for="Password">Password   :</label>
        <input type="password" id="Pass" name="password">
        <span id="passwordjsE" style="color: red;"> * <?php echo $User_PasswordEr;  ?></span>
        <br>
       
        <br>
        <input type="submit" name="submit" id="log" value="Register"> <br> <br>
  <h4 style="display: inline; color:blue"> Already Have an account ?</h4> <a href="Login.php">Sign In</a>
</div>
    

    <br>

</form>

</div>    
<span><?php echo $successMesg ?></span>
<span><?php echo $errorMesg ?></span>
<?php

?>

</body>

</html>
