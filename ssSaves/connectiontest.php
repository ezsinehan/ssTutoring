<?php

$conn = mysqli_connect('hostname', 'username', 'password', 'database');
if ($conn) {
    echo "Connected to database successfully";
} else {
    echo "Connection failed: " . mysqli_connect_error();
}

?>