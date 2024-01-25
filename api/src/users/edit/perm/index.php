<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['user']) && isset($_POST['level'])) {

        $mysqli = new mysqli("db", "root", "password", "wypok");

        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }
        $level = $_POST['level'];
        $user = $_POST['user'];
        $statement = $mysqli->prepare("UPDATE user SET permission = ? WHERE user = ?");

        $statement->bind_param("ss", $level, $user);
        $statement->execute();
        if ($statement->affected_rows > 0) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
        $statement->close();
    } else {
        echo "Error, missing argument";
    }
} else {
    echo "Error, wrong request type";
}
