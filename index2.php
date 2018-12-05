<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CS3319 Assignment 3</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Welcome to Christophers Assignment 3!</h1>

<!-- List all information about customer, when a customer is selected, display purchasing information for that customer -->
<h2>Customers: </h2>
<form action="getCustomerProductInfo.php" method="post">
<?php
include 'getdata.php';
?>
<input type="submit" value="Get Customer Product Information">
</form>

<!-- Add a new purchase -->
<hr>
<p>
<h2> ADD A NEW PURCHASE:</h2>
<form action="addNewPurchase.php" method="post">
New Quantity: <input type="text" name="Quantity"><br>
New Product: <br>
<?php
include 'getProductData.php';
?>
For which customer: <br>
<?php
include 'getdata.php';
?>
<input type="submit" value="Insert new purchase">
</form>

<!-- Add a new customer -->
<hr>
<p>
<h2> ADD A NEW CUSTOMER:</h2>
<form action="addNewCustomer.php" method="post">
First Name: <input type="text" name="FirstName"><br>
Last Name: <input type="text" name="LastName"><br>
City: <input type="text" name="City"><br>
Phone Number: <input type="text" name="PhoneNumber"><br>
Agent ID: <input type="text" name="AgentID"><br>
<input type="submit" value="Add new customer">
</form>

<!-- Update a customers phone number -->
<hr>
<p>
<h2> UPDATE CUSTOMER PHONE NUMBER:</h2>
<form action="updateCustomerPhone.php" method="post">
For which customer: <br>
<?php
include 'getdata2.php';
?>
<input type="submit" value="Update phone number for this customer">
</form>

<!-- Delete a customer -->
<hr>
<p>
<h2> DELETE A CUSTOMER:</h2>
<form action="deleteCustomer.php" method="post">
For which customer: <br>
<?php
include 'getdata.php';
?>
<input type="submit" value="Delete this customer">
</form>

<!-- List customers who have bought more than a given quantity of any product -->
<hr>
<p>
<h2> LIST CUSTOMERS WHO HAVE BOUGHT MORE THAN A GIVEN QUANTITY OF ANY PRODUCT:</h2>
<form action="listEliteCustomers.php" method="post">
Specify quantity: <input type="text" name="quantity"><br>
<input type="submit" value="List customers who have bought more than this quantity of any product.">
</form>

<!-- List the description of any product that has never been purchased -->
<hr>
<p>
<h2> LIST THE DESCRIPTION OF ANY PRODUCT THAT HAS NEVER BEEN PURCHASED:</h2>
<form action="neverBeenPurchased.php" method="post">
<input type="submit" value="List the description of any product that has never been purchased.">
</form>

<!-- List the total number of purchases for a particular product and the product description and the total money made in sales for that product (cost * quantity) -->
<hr>
<p>
<h2> LIST THE TOTAL NUMBER OF PURCHASES FOR A PRODUCT AND THE TOTAL MONEY MADE IN SALES FOR THAT PRODUCT:</h2>
<form action="getMoney.php" method="post">
Specify product: <input type="text" name="product"><br>
<input type="submit" value="List the total number of purchases for a particular product and the product description and the total money made in sales for that product.">
</form>

<?php
mysqli_close($connection);
?>

<ol>
</ol>
</body>
</html>
