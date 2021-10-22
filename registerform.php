<?php
$servername = "localhost";
$username = "username";
$password = "password";
$database = "register";

$formname = $_GET["name"];
$formmail = $_GET["mail"];
$formpass = $_GET["pass"];
$idselect = "SELECT MAX(ID) FROM users";

$conn = new mysqli($servername, $username, $password, $database); //start connection
if ($conn->connect_error) { //connection check
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

mysqli_set_charset($conn, "utf8"); //utf8
$result = mysqli_query($conn, $idselect);
$nextid=0;
while($row = mysqli_fetch_row($result)){
    printf($row[0]);
    $nextid=$row[0]+1;

    $sql = "INSERT INTO users (ID, Name, Mail, Pass)
    VALUES ('". $nextid ."','". $formname ."','". $formmail ."', '". $formpass ."')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
}



mysqli_close($conn);  //close connection

?>