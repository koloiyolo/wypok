<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['user'])) {

        $mysqli = new mysqli("db", "root", "password", "wypok");

        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }

        $user = $_POST['user'];
        $statement = $mysqli->prepare("DELETE FROM user WHERE user = ?");

        $statement->bind_param("is", $user);
        $statement->execute();
        if ($statement->affected_rows > 0) {
            echo "Record deleted successfully!";
        } else {
            echo "Error deleting record: " . $statement->error;
        }
        $statement->close();
    } else {
        echo "Error, missing argument";
    }
} else {
    echo "Error, wrong request type";
}
