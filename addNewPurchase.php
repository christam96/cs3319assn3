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
  $CustomerID = $_POST["customer"];
  $ProductID = $_POST["product"];
  $Quantity =$_POST["Quantity"];

  $QueryToCount = "SELECT COUNT(*) FROM purchasingInfo WHERE ProductID='$ProductID' AND CustomerID='$CustomerID'";
  $countResult = mysqli_query($connection, $QueryToCount);
  if (!$countResult) {
    die("database query failed");
  }

  $count = mysqli_fetch_assoc($countResult);

  if ($count['COUNT(*)'] == 0)
      $query = "INSERT INTO purchasingInfo VALUES ('$CustomerID', '$ProductID', '$Quantity')";
  else
      $query = "UPDATE purchasingInfo SET Quantity = Quantity + '$Quantity' WHERE CustomerID = '$CustomerID' AND ProductID = '$ProductID'";

  if (!mysqli_query($connection, $query)) {
       die("Error: insert failed" . mysqli_error($connection));
   }
   echo "Your purchase was added!";

   mysqli_close($connection);

/*
  $query1= 'SELECT max(ProductID) AS maxid FROM purchasingInfo';
   $result=mysqli_query($connection,$query1);
   if (!$result) {
          die("database max query failed.");
   }
   $row=mysqli_fetch_assoc($result);
   // $newkey = intval($row["maxid"]) + 1;
   // $ProductID = (string)$newkey;
   $query = 'INSERT INTO purchasingInfo values("' . $CustomerID . '","' . $ProductID . '","' . $Quantity . '")';
   //$query = 'SELECT * FROM purchasingInfo';
   if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
    }
    echo "Your purchase was added!";

    mysqli_close($connection);
*/
?>
</ol>
</body>
</html>
