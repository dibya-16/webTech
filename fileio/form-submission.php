<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form Submisiion</title>
</head>
<body>

 <?php 

 $firstName=$_POST['firstName'];
 $lastName=$_POST['lastName'];

 
 $rel=$_POST['religion'];
 $email=$_POST['email'];
 $username=$_POST['username'];
 $password=$_POST['password'];

 $submitted=false;
 ?>
 <?php  
		if ($_SERVER["REQUEST_METHOD"] == 'POST') {

			if (empty($firstName)||empty($lastName)||empty($_POST['gender'])||empty($rel)||empty($email)||empty($username)||empty($password)) 
			{
				$isValid = false;
				echo "Please fill up the form properly";
				$submitted=false;
			}
			else {
				$isValid = true;
				echo "submitted successfully";
				$submitted=true;
			}
		} 


	?>

	<?php
	    function sanitize($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
    ?>
    <?php
		if ($isValid) 
		{

			$firstName=sanitize($firstName);
			$lastName=sanitize($lastName);
			$email=sanitize($email);

			$rel=sanitize($rel);
			$username=sanitize($username);
			$password=sanitize($password);
		}


	?>

	<?php
		if ($isValid) { 
			$handle = fopen("data.json", "a");
			$arr = array('username' => $username,'password' => $password);
			$encode = json_encode($arr);

			$res = fwrite($handle, $encode . "\n");
		}
		else
		{
			$res=false;
		}
	?>	
    <?php
		if ($res and $submitted) {
			echo "<br>";
			echo "Information saved successully.";
		}
		else {
			echo "<br>";
			echo "Error while saving.";
		}
	?>

	<br><br>

	<a href="form.html"> Register  </a> | <a href="LoginForm.php" >Login </a>
</body>
</html>






	
