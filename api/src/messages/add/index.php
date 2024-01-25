<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['user']) && isset($_POST['message'])) {

        $mysqli = new mysqli("db", "root", "password", "wypok");

        // catches errors from db connections
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }


        $user = $_POST['user'];
        $currentDate = date("Y-m-d");
        $message = $_POST['message'];

        $statement = $mysqli->prepare("INSERT INTO message (user, message, date) VALUES (?, ?, ?)");
        $statement->bind_param("sss", $user, $message, $currentDate);
        $statement->execute();
        if ($statement->affected_rows > 0) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
        $statement->close();

    } else {
        echo "Not enough parametrs";
    }
} else {
    echo "Wrong request method";
}
?>