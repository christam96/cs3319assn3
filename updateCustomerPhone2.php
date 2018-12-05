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
  $PhoneNumber = $_POST["newPhoneNumber"];
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
    $query = "UPDATE customer SET PhoneNumber = '$PhoneNumber' WHERE CustomerID = '$CustomerID'";
    if (!mysqli_query($connection, $query)) {
         die("Error: insert failed" . mysqli_error($connection));
     }
     echo "Phone number has been updated!";

    mysqli_close($connection);
  }

?>
</ol>
</body>
</html>
