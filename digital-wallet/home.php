<?php

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   $val= $_POST['select_value'];
   $select = $_POST['select'];
   $amount=$_POST['amount'];

   if (empty($val) or empty($select)) {
     echo "Please give proper input..";
   }else{
     if(file_exists("beneficiarydata.json")){
               $handle = fopen("beneficiarydata.json","r");
               $data = fread($handle,filesize("beneficiarydata.json"));
               $data = explode("\n",$data);

               for($i=0;$i< count($data) -1 ;$i++){
                 $json = json_decode($data[$i]);
                 if($select === $json->select){
                   
                   $amount ="" ;
                   $handle = fopen("historydata.json", "a");
                    $arr1 = array('beneficiary' => $select, 'mobile' => $val,'amount'=>$amount);
                    $arr1 = json_encode($arr1);
                    fwrite($handle, $arr1 . "\n");

                 }

             }
         }
       }
   }


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home Page1</title>
  </head>
  <body>

    <h1>Page 1[Home]</h1><br>
    <h3>Digital Wallet</h3><br>
    1.<a href="home.php">Home</a> &nbsp 2.<a href="beneficiary.php">Add Beneficiary</a>&nbsp 3.<a href="transactionHistory.php">Transaction History</a><br>
    <h3>Fund Transfer:</h3><br>

     <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
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
       Select Catagory :*&nbsp &nbsp&nbsp&nbsp<select  name="select">

                                    <option>Select a Value</option>
                                    <?php
                                   for ($j=0; $j <count($arr1)-1; $j++) {
                                     echo "<option>";
                                     echo  $arr1[$j]->beneficiary;
                                     echo "</option>";
                                   }
                                     ?>

                                </select><br><br><br>
     To :*&nbsp &nbsp&nbsp&nbsp<select  name="select_value">

                                    <option>Select a Value</option>
                                    <?php
                                   for ($j=0; $j <count($arr1)-1; $j++) {
                                     echo "<option>";
                                     echo  $arr1[$j]->mobile;
                                     echo "</option>";
                                   }
                                     ?>

                                </select><br><br><br>
      
      Amount&nbsp&nbsp&nbsp<input type="text" name="amount" placeholder="Amount" value="<?php echo $amount??"" ;?>" >
      &nbsp<br><br> <input type="submit"  name="submit"  value="Submit"><br><br>


    </form><br>



  </body>
</html>
