<?php
  //Get the total money made from the specified product
  include "connectdb.php";
  $Product = $_POST["product"];
  $query1 = "SELECT SUM(purchInfo.Quantity) AS total FROM purchasingInfo AS purchInfo INNER JOIN product AS p ON purchInfo.ProductID = p.ProductID WHERE purchInfo.ProductID = '" . $Product . "';";
  $query2 = "SELECT Description AS d, Cost FROM product WHERE ProductID = '" . $Product . "';";
  $result1 = mysqli_query($connection, $query1);
  $result2 = mysqli_query($connection, $query2);
  $row1 = mysqli_fetch_assoc($result1);
  $row2 = mysqli_fetch_assoc($result2);
  echo "<br><b>" . $row2["d"] . "</b><br>Total Purchases: " . $row1["total"] . "<br>Total Money Made: $" . $row1["total"] * $row2["Cost"] . "<br><br>";
  mysqli_free_result($result1);
  mysqli_free_result($result2);
  mysqli_close($connection);
?>
