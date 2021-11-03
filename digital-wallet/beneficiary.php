<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Beneficiary</title>
  </head>
  <body>
    <h1>Page 2[Add Beneficiary]</h1><br>
    <h3>Digital Wallet</h3><br>
    1.<a href="home.php">Home</a> &nbsp 2.<a href="beneficiary.php">Add Beneficiary</a>&nbsp 3.<a href="transactionHistory.php">Transaction History</a><br>
    <h3>Add Beneficiary:</h3><br>

     <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="POST">
       Beneficiary Name: &nbsp&nbsp&nbsp<input type="text" name="beneficiary" placeholder="Enter a value"> Mobile No:&nbsp&nbsp&nbsp<input type="tel" name="mobile" placeholder="Enter a value">&nbsp <input type="submit"  name="submit"  value="Submit"><br><br>

     </form>
     <?php

   		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   			$beneficiary= $_POST['beneficiary'];
   			$mobileNo = $_POST['mobile'];
      
   			if (empty($beneficiary) or empty($mobileNo)) {
   				echo "Please give  proper input..";
   			}
   			else {
   				$beneficiary = validate($beneficiary);
   				$mobileNo = validate($mobileNo);
          


   				$handle = fopen("beneficiarydata.json", "a");
   				$arr1 = array('beneficiary' => $beneficiary, 'mobile' => $mobileNo);
   				$arr1 = json_encode($arr1);
   				fwrite($handle, $arr1 . "\n");

   				echo "Input successful.... ";
   			}
   		}

   		function validate($data) {
   			$data = trim($data);
   			$data = stripslashes($data);
   			$data = htmlspecialchars($data);
   			return $data;
   		}
   	?>

    <?php
   	$handle = fopen("beneficiarydata.json", "r");
   	$data = fread($handle, filesize("beneficiarydata.json"));
   	$exploded = explode("\n", $data);

   	$arr1 = array();
   	for ($i =0; $i < count($exploded); $i++){

   		 $decode = json_decode($exploded[$i]);
   		 array_push($arr1, $decode);
	}

   ?>
<table border="1">
 <thead>
   <tr>
     <th>BeneficiaryName</th>
     <th>Mobile No</th>
     
   </tr>
 </thead>
 <tbody>
   <?php
  for ($j=0; $j <count($arr1)-1; $j++) {
    echo "<tr>";
    echo "<td>";
    echo $arr1[$j]->beneficiary;
    echo "</td>";
    echo "<td>";
    echo $arr1[$j]->mobile;
    echo "</td>";
    
  }
    ?>
 </tbody>
</table>
  </body>
</html>
