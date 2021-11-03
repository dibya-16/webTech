<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>History</title>
  </head>
  <body>
    <h1>Page 3[Transaction History]</h1><br>
    <h3>Digital Wallet</h3><br>
    1.<a href="home.php">Home</a> &nbsp 2.<a href="beneficiary.php">Add Beneficiary</a>&nbsp 3.<a href="transactionHistory.php">Transaction History</a><br>
     <br><br>
    From: <input type="date"name="From">&nbsp &nbsp &nbsp  To: <input type="date"name="To">
    <br><br>
    <?php
    $handle = fopen("historydata.json", "r");
    $data = fread($handle, filesize("historydata.json"));
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
     <th>Trannsaction Category</th>
     <th>To</th>
     <th>Amount</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($j=0; $j <count($arr1)-1; $j++) {
    echo "<tr>";
    echo "<td>";
    echo $arr1[$j]->TrannsactionCategory;
    echo "</td>";
    echo "<td>";
    echo $arr1[$j]->To;
    echo "</td>";
    echo "<td>";
    echo $arr1[$j]->Amount;
    echo "</td>";
    echo "</tr>";
    }
    ?>
    </tbody>
    </table>
  </body>
</html>

