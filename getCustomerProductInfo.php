<!DOCTYPE html>
<html>
<head>
  <style>
    table, th, td {border: 1px solid black;}
</style>
<meta charset="utf-8">
<title>Customer Product Information</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Customers purchase information:</h1>
<ol>
<?php
   $whichOwner= $_POST["customer"];

   // How the user might want to sort the information:
   $userSelectedProperty = $_GET['Description'];
   $userSelectedProperty = $_GET['Price'];

   // Query
   $query = 'SELECT Description, CostPerItem, Quantity FROM purchasingInfo, product WHERE purchasingInfo.ProductID = product.ProductID AND purchasingInfo.CustomerID="' . $whichOwner . '"';

   //switch ($userSelectedProperty) {
     //case 'Description' : { $query .= "Description"; break; }
   //}

   $result=mysqli_query($connection,$query);
   if (!$result) {
      die("database query2 failed.");
   }
   if ($result->num_rows > 0) {
       echo "<table><tr><th>Product Description</th><th>Price</th><th>Quantity</th></tr>";
       // output data of each row
       while($row = $result->fetch_assoc()) {
           echo "<tr><td>" . $row["Description"]. "</td><td>" . $row["CostPerItem"]. "</td><td> " . $row["Quantity"]. "</td></tr>";
       }
   echo "</table>";
   } else {
    echo "0 results";
   }

  mysqli_free_result($result);
?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html>
