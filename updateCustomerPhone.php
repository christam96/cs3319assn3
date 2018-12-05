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
echo "Customer ID: ";
echo $CustomerID;
$query = "SELECT PhoneNumber FROM customer WHERE CustomerID = '$CustomerID'";
$result=mysqli_query($connection,$query);
if (!$result) {
       die("database max query failed.");
}
$row = $result->fetch_assoc();
echo "\nCurrent phone number: ";
echo $row["PhoneNumber"];
?>

<form action="updateCustomerPhone2.php" method="post">
Enter a new phone number: <input type="text" name="newPhoneNumber"><br>
Confirm customer via ID (listed at top of page): <input type="text" name="CustomerID"><br>
<input type="submit" value="Update phone number">
</form>

</ol>
</body>
</html>
