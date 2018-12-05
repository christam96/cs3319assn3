<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Purchases Information</title>
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h1></h1>
<ol>

<?php
  $CustomerID = $_POST["CustomerID"];

  $testQuery = "SELECT COUNT(*) FROM customer WHERE CustomerID = '$CustomerID'";
  $countResult = mysqli_query($connection, $testQuery);
  if (!$countResult) {
    die("database query failed");
  }
  $count = mysqli_fetch_assoc($countResult);
  if ($count['COUNT(*)'] == 0) {
      echo "Error: Wrong ID. Please return to previous page.";
  } else {
    $testQuery2 = "SELECT COUNT(*) FROM purchasingInfo WHERE CustomerID = '$CustomerID'";
    $countResult2 = mysqli_query($connection, $testQuery2);
    if (!$countResult2) {
      die("database query failed");
    }
    $count2 = mysqli_fetch_assoc($countResult2);
    if ($count2['COUNT(*)'] > 0) {
        $purchasingInfoQuery = "DELETE FROM purchasingInfo WHERE CustomerID = '$CustomerID'";
        if (!mysqli_query($connection, $purchasingInfoQuery)) {
             die("Error: delete failed" . mysqli_error($connection));
         }
    }

    // Since we have deleted the foreign key of customer in purchasingInfo table, we may now delete the customer from our customer
    $query = "DELETE FROM customer WHERE CustomerID = '$CustomerID'";
    if (!mysqli_query($connection, $query)) {
      die("Error: delete failed" . mysqli_error($connection));
    }
    echo "Customer has been deleted!";
    mysqli_close($connection);
  }
?>
</ol>
</body>
</html>
