<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Login Form</title>

</head>

<body>

	<?php

		$handle = fopen("data.json", "r");
		$data = fread($handle, filesize("data.json"));
	?>


	<?php

		$explode = explode("\n", $data);
	
	?>


	<?php

		$arr= array();
		for ($i = 0; $i < count($explode)-1; $i++)
		{
			$json=json_decode(($explode[$i]));
			array_push($arr, $json);
		}
	?>

	<h1>Login Form</h1>
 	<form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF']) ?>" method="POST">
		UserName: <input type="text" name="username"placeholder="Username">
		<br><br>
		Password: <input type="text" name="password"placeholder="Password">
		<br><br>
		<input type="submit" name="login" value="Login">
	</form>




	<?php
		if($_SERVER['REQUEST_METHOD'] === "POST" and count($_REQUEST)>0)
		{
			$flag=false;
			for($k = 0;$k< count($arr); $k++)
			{
				if(($_POST['username'] === $arr[$k]-> username) and ($_POST['password'] === $arr[$k]-> password) )
				{
					$flag=true;
				}

			}

			if ($flag)
			{
				
				header("Location:Welcome.php");
			}
			else {
				echo "Login failed.";
			}

		}

	?>

	Not registered yet? <a href="form.html"> Click here </a> for registration.

</body>
</html>