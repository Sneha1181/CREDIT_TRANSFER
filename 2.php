<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "money";
$userid = $_POST['id'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
echo "<body style='background-color:pink'>";
$sql = "SELECT id, name, email,credit FROM user where id='$userid'";
$result = $conn->query($sql);
echo "<center>";
if ($result->num_rows> 0) {
  echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th><th>Credit</th></tr>";
  while($row = $result->fetch_assoc()) 
    echo "<tr><td>  " . $row["id"]. "</td><td> " . $row["name"]. " </td><td>     " . $row["email"].  "    </td><td>  " . $row["credit"]."</td></tr>";
 }
else {
  echo "0 results";
}
echo "</table><br><br><br>";
echo "<font size='6' color='white'><marquee>FOR TRANSFERRING MONEY, FILL THIS FORM......!!!</marquee></font>";
echo "<table border='1'>";
echo "<form action='3.php' method='post'><tr><td>YOUR ID </td><td>  <input type='text' name='sid'></td></tr>";
echo "<tr><td>NAME    </td><td> <input type='text' name='sname'></td></tr>";
echo "<tr><td>RECEIVER ID </td><td>  <input type='text' name='id'></td></tr>";
echo "<tr><td>RECEIVER     </td><td> <input type='text' name='name'></td></tr>";
echo "<tr><td>AMOUNT   </td><td> <input type='text' name='amount'></td></tr>";
echo "<tr><td><input type='submit' value='Transfer'></form></td></tr>";
echo "</table><br><br><br>";
$conn->close();
?>