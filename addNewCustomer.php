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
  $FirstName = $_POST["FirstName"];
  $LastName = $_POST["LastName"];
  $City = $_POST["City"];
  $PhoneNumber =$_POST["PhoneNumber"];
  $AgentID = $_POST["AgentID"];
  $query1= 'SELECT max(CustomerID) AS maxid FROM customer';
   $result=mysqli_query($connection,$query1);
   if (!$result) {
          die("database max query failed.");
   }
   $row=mysqli_fetch_assoc($result);
   $newkey = intval($row["maxid"]) + 1;
   $CustomerID = (string)$newkey;
   $query = 'INSERT INTO customer values("' . $CustomerID . '","' . $FirstName . '","' . $LastName . '","' . $City . '","' . $PhoneNumber . '","' . $AgentID . '")';
   if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
    }
    echo "Customer was added!";
    mysqli_close($connection);
?>
</ol>
</body>
</html>
