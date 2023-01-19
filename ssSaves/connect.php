<?php
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$phoneNumber = $_POST["phoneNumber"];

$conn = new mysqli('localhost', 'root', 'ssbase');
if ($conn->connect_error){
    die('Connection Failed : '.$conn ->connect_error);
}else{
    $stmt = $conn->prepare("insert into registration(firstName, lastName, email, phoneNumber) values(?, ?, ?, ?)");
    $stmt->bind_param("sssi", $firstName, $lastName, $email, $phoneNumber);
    $execval = $stmt->execute();
    echo $execval;
    echo "registration successfully...";
    $stmt->close();
    $conn->close();
}

?>