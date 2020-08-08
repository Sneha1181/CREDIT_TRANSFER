<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "money";
$sid=$_POST['sid'];
$sname = $_POST['sname'];
$uid=$_POST['id'];
$uname = $_POST['name'];
$amt = $_POST['amount'];
$conn = new mysqli($servername, $username, $password, $dbname);
echo "<body background='BG4.jpg'>";
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
echo "<center>";
$sql="INSERT into transaction(sender,receiver,amount)values('$sname','$uname','$amt')";
$insert = $conn->query($sql);
echo "<font size='7'><b>TRANSACTION TABLE</b></font><br><br><br>";
$sql1 = "SELECT sender,receiver,amount FROM transaction";
$result = $conn->query($sql1);
if ($result->num_rows> 0) {
  echo "<table border='1'><tr><th>Sender</th><th>Receiver</th><th>Amount</th></tr>";
  while($row1 = $result->fetch_assoc()) 
    echo "<tr><td>" . $row1["sender"]. "</td><td> ". $row1["receiver"]. "</td><td> " . $row1["amount"]. "   </td>    " ;
}
echo "</table><br><br>";
echo "<b>Amount before transferring :</b>";
$send = "SELECT credit FROM user where id='$sid'";
$sender = $conn->query($send);
$row = $sender->fetch_assoc();
echo $row["credit"];
echo "<br><br><br>";
echo "<b>Amount before receiving :</b>";
$receive = "SELECT credit FROM user where id='$uid'";
$receiver = $conn->query($receive);
$row = $receiver->fetch_assoc();
echo $row["credit"];
echo "<br><br><br>";
$sql2="UPDATE User Set credit=credit+'$amt' where id=$uid";
$update = $conn->query($sql2);
$sql3="UPDATE User Set credit=credit-'$amt' where id=$sid";
$update1 = $conn->query($sql3);
$sql4 = "SELECT id, name, email,credit FROM user";
$result = $conn->query($sql4);
echo "<center>";
echo "<font size='7'><b>USERS</b></font><br><br>";
if ($result->num_rows> 0) {
  echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th><th>Credit</th></tr>";
  while($row = $result->fetch_assoc()) 
    echo "<tr><td>" . $row["id"]. "</td><td> " . $row["name"]. "   </td><td>    " . $row["email"].  "      </td><td>   " . $row["credit"]."</td></tr>";
}
else {
  echo "0 results";
}
echo "</table><br><br><br>";
echo "</body>";
$conn->close();
?>