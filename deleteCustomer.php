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
?>

<form action="deleteCustomer2.php" method="post">
Confirm customer to delete via ID (listed at top of page): <input type="text" name="CustomerID"><br>
<input type="submit" value="Delete customer">
</form>

</ol>
</body>
</html>
