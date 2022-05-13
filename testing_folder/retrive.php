<?php
$ini = parse_ini_file('../conf/config.ini');
$db = new mysqli($ini['host'], $ini['dbUsername'], $ini['dbPassword'], $ini['dbName']);
$result = mysqli_query($db, "SELECT user_profile FROM user_login_info WHERE user_profile <> '';");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // echo $row['user_profile'] . '<br>';

?>
        <img src="../testing_folder/image/<?php echo $row['user_profile']; ?>" alt="user's profile picture" style="height: 200px; width:auto;">
<?php
    }
} else {
    echo "Image(s) not found...";
}
?>