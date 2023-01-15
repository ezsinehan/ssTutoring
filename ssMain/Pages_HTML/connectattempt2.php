<?php
if(isset($_POST['submit'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];

    //connect to the database
    $conn = mysqli_connect("localhost", "root", "", "ssGettingStartedDB");

    //check for connection errors
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

    //insert data into the database
    $sql = "INSERT INTO register (firstName, lastName, email, phoneNumber) VALUES ('$firstName', '$lastName', '$email', '$phoneNumber')";
    if(mysqli_query($conn, $sql)){
        echo "Record created successfully";
    } else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    //close the connection
    mysqli_close($conn);
}
?>
