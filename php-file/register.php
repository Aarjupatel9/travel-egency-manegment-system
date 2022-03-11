<?php

echo "enter in php<br>";

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $crp = crypt($password, "st");
    echo $crp;
    //echo $username;  // +  " " + $password + " " + $ema + " " + $phone + "<br>";

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "travel_agency";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die('Could not connect to the database.');
    } else {
        $Select = "SELECT email FROM user_login_info WHERE email = ? LIMIT 1";
        $Insert = "INSERT INTO user_login_info(username, password, email, number) values(?, ?, ?, ?)";

        $stmt = $conn->prepare($Select);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($resultEmail);
        $stmt->store_result();
        $stmt->fetch();
        $rnum = $stmt->num_rows;

        if ($rnum == 0) {
            $stmt->close();

            $stmt = $conn->prepare($Insert);
            $stmt->bind_param("sssi", $username, $password, $email, $phone);
            if ($stmt->execute()) {
                echo "New record inserted sucessfully.";
            } else {
                echo $stmt->error;
            }
        } else {
            // echo "Someone already registers using this email.";
            
        }
        $stmt->close();
        $conn->close();
    }
} else {
    echo "All field are required.";
    die();
}
// } else {
//     echo "Submit button is not set";
// }
