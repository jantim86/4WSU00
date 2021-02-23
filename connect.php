<?php

echo 'hallo';
$servername = "localhost";
$username = "root";
$password = "";
$db = 'data';


// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql_create_masses_table = 
" CREATE TABLE IF NOT EXISTS masses (
    id integer PRIMARY KEY AUTO_INCREMENT,
    user_id integer NOT NULL,
    name text NOT NULL,
    mass integer NOT NULL,
    date DATETIME NOT NULL
); ";
mysqli_query($conn, $sql_create_masses_table);
if ($conn->query($sql_create_masses_table) === TRUE) {
    echo "Database created successfully";
   } else {
    echo "Error creating database: " . $conn->error;
   }
$food = $_GET['name'];
$mass = $_GET['mass'];

$sql = "INSERT INTO masses (user_id, name, mass, date)
VALUES (2, '" . $food . "', ". $mass .", '". date("Y-m-d H:i:s") ."')";
#echo $sql;
if (mysqli_query($conn, $sql)) {
 echo "New record created successfully<br>";
} else {
 echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
}

$sql = "SELECT * FROM masses";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
 echo "id: " . $row["id"]." name: " . $row["name"]." user_id: " . $row["user_id"]." Mass: ".$row["mass"]." date: " . $row["date"]."<br>";
 }
} else {
 echo "0 results";
}
echo '<script type="text/javascript"> window.close(); </script>';
?>
<script type="text/javascript">
    window.close();
</script>