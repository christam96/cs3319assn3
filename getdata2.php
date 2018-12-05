
<?php
$query = "SELECT * FROM customer ORDER BY LastName";
$result = mysqli_query($connection,$query);
if (!$result) {
    die("databases query failed.");
}
while ($row = mysqli_fetch_assoc($result)) {
     echo '<input type="radio" name="customer" value="';
     echo $row["CustomerID"];
     echo '"("">' . $row["CustomerID"] . ") " . $row["FirstName"] . " " . $row["LastName"] . "<br>";

}
mysqli_free_result($result);
?>
