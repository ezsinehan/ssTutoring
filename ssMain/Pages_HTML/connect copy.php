<?php

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];



if (!empty($firstName) || !empty($lastName) || !empty($email) || !empty($phoneNumber)) {

$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'ssGettingStartedDB';

//Connection -
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
} else {
    $SELECT = "SELECT email from register Where email = ? Limit 1";
    $INSERT = "INSERT Into register (firstName, lastName, email, phoneNumber) values(?, ?, ?, ?)";

    //Prepare Statement
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if ($rnum ==0) {
        $stmt->close();

        $stmt = $conn-> prepare($INSERT);
        $stmt->bind_param("sssi", $firstName, $lastName, $email, $phoneNumber);
        $stmt->execute();
        echo "New Record Inserted"; 
    } else {
        echo "Already Registered";
    }
    $stmt->close();
    $conn->close();

    header("Location: ../ssHiddenPages/ssPostSubmissionPage.html");
exit;

}
}



?> 
