<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "money";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, name, email,credit FROM user";
$result = $conn->query($sql);
echo "<body background='BG3.png'>";
echo "<center>";
echo "<font size='7' color='white'><b>CO_USERS</b></font><br><br>";
if ($result->num_rows> 0) {
  echo "<table border='1'><tr><th><font size='5' color='white'>ID</font></th><th><font size='5' color='white'>Name</font></th><th><font size='5' color='white'>Email</font></th><th><font size='5' color='white'>Credit</font></th></tr>";
  while($row = $result->fetch_assoc()) 
    echo "<tr><td><font size='4' color='white'>" . $row["id"]. "</td><td><font size='4' color='white'> " . $row["name"]. "   </td><td><font size='4' color='white'>    " . $row["email"].  "      </td><td><font size='4' color='white'>   " . $row["credit"]."</td></tr>";
  
}
else {
  echo "0 results";
}
echo "</table><br><br><br>";
echo "<font size='5' color='white'><b>Enter the ID to view Particular User<br>"; 
echo "<form action='2.php' method='post'>ID :  <input type='text' name='id'><br><br>";
echo "<input type='submit' value='VIEW'><br><br><br></form>";
echo "</body>";
echo "</b></font>";
$conn->close();
?>