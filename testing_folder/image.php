<?php
error_reporting(0);
?>
<?php
$msg = "";
$ini = parse_ini_file('../conf/config.ini');
// If upload button is clicked ...
if (isset($_POST['upload'])) {


    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "image/" . $filename;

    // echo $filename . "<br>" . $folder . "<br>";

    $db = new mysqli($ini['host'], $ini['dbUsername'], $ini['dbPassword'], $ini['dbName']);

    // Get all the submitted data from the form
    $sql = "INSERT INTO user_login_info (user_profile) VALUES ('$filename')";

    // Execute query
    mysqli_query($db, $sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload image";
    }

    echo $msg;
}

?>

