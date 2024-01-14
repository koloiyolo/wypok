<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {

        $mysqli = new mysqli("db", "root", "password", "wypok");

        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }

        $id = $_POST['id'];
        $statement = $mysqli->prepare("DELETE FROM post WHERE id = ?");

        $statement->bind_param("s", $id);
        $statement->execute();
        if ($statement->affected_rows > 0) {
            echo "Record added successfully!";
        } else {
            echo "Error adding record: " . $statement->error;
        }
        $statement->close();
    } else {
        echo "Error, missing argument";
    }
} else {
    echo "Error, wrong request type";
}
