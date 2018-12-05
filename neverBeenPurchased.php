<!DOCTYPE html>
<html>
<head>
<style>
    table, th, td {border: 1px solid black;}
</style>
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
  $query = "SELECT Description FROM product WHERE ProductID NOT IN (SELECT ProductID FROM purchasingInfo)";
  $result = mysqli_query($connection, $query);
  if (!$result) {
    die("database query failed");
  }
  if ($result->num_rows > 0) {
      echo "<table><tr><th>Description</th></tr>";
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["Description"]. "</td></tr>";
      }
  echo "</table>";
  } else {
   echo "0 results";
  }

 mysqli_free_result($result);

?>
</ol>
</body>
</html>
