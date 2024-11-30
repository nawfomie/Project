<?php

$servername = "localhost";

$username = "root";

$password = "";

// Create connection

$conn = mysqli_connect($servername, $username,
$password);

// Check connection

if (!$conn) {

die("Connection failed: " .
mysqli_connect_error());

}

echo "Connected successfully";

/* Create database

$sql = "CREATE DATABASE testDb";

if (mysqli_query($conn, $sql)) {

echo "Database created successfully";

} else {

echo "Error creating database: " .
mysqli_error($conn);

}
*/
mysqli_select_db($conn,'testDb');
/*$query = "

CREATE TABLE Clients (

id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY
KEY,

firstname VARCHAR(30) NOT NULL,

lastname VARCHAR(30) NOT NULL,

email VARCHAR(50) UNIQUE,

password VARCHAR(80),

reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
ON UPDATE CURRENT_TIMESTAMP

)

";

if (mysqli_query($conn, $query)) {

echo "Table Clients created successfully";

} else {

echo "Error creating table: " .
mysqli_error($conn);

}

// hachage du mot de passe

$password = password_hash("Said124589",
PASSWORD_DEFAULT);

$sql = "INSERT INTO Clients (firstname,
lastname, email,password)

VALUES ('Mohamed', 'Bendar',
'bendarmohamed6@gmail.com','$password')";

if (mysqli_query($conn, $sql)) {

echo "New record created successfully";

} else {

echo "Error: " . $sql . "<br>" .
mysqli_error($conn);

}
*/
$sql = "SELECT id, firstname, lastname FROM
clients";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

// output data of each row

while($row = mysqli_fetch_assoc($result)) {

echo "id: " . $row["id"]. " - Name: " .
$row["firstname"]. " " . $row["lastname"].
"<br>";

}

} else {

echo "0 results";

}
$sql = "SELECT id, firstname, lastname,password FROM Clients
WHERE email='bendarmohamed6@gmail.com'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

// output data of each row

while($row = mysqli_fetch_assoc($result)) {

echo " pass: " . $row["password"]. " - Name: " .
$row["firstname"]. " " . $row["lastname"]. "<br>";

if(password_verify("Said124589", $row["password"])) {

echo "valid";

}else{

echo "no";

}

}

} else {

echo "0 results";

}
?>