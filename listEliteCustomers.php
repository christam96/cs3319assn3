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
   //$Quantity= $_POST["quantity"];
   $Quantity= intval($_POST["quantity"]);

   // Query
   $query = 'SELECT FirstName, LastName, Description, Quantity FROM customer INNER JOIN purchasingInfo ON customer.CustomerID = purchasingInfo.CustomerID INNER JOIN product ON purchasingInfo.ProductID = product.ProductID WHERE purchasingInfo.Quantity > "' . $Quantity . '"';
   $result=mysqli_query($connection,$query);
   if (!$result) {
      die("database query2 failed.");
   }
   if ($result->num_rows > 0) {
       echo "<table><tr><th>First Name</th><th>Last Name</th><th>Description</th><th>Quantity</th></tr>";
       // output data of each row
       while($row = $result->fetch_assoc()) {
           echo "<tr><td>" . $row["FirstName"]. "</td><td>" . $row["LastName"]. "</td><td> " . $row["Description"]. "</td><td> " . $row["Quantity"]. "</td></tr>";
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
