<?php

// use LDAP\Result;

if (isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // echo $email .$password . "<br>";

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "travel_agency";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die('Could not connect to the database.');
    } else {


        $Select = "SELECT password FROM admin_info WHERE email = '$email' ";
        $result = $conn->query($Select);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                //  echo "id: " . $row["password"] . '<br>';
                if ($password == $row["password"]) {
                    include '../admin/admin.html';
                
                } else {
                    echo "Password is wrong...";
                }
            }
        } else {
            echo "There is no account with this Email.. please register with the email..Contact Administrater... Thank you ";
        }

        $conn->close();
    }


    

} else {
    echo "All field are required.";
    die();
}
// } else {
//     echo "Submit button is not set";
// }
