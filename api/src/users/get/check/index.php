<?php
if ($_SERVER['REQUEST-METHOD'] === 'POST') {
    if (isset($_POST['user'])) {

        $user = $_POST['user'];

        $mysqli = new mysqli("db", "root", "password", "wypok");

        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }

        $statement = $mysqli->prepare("SELECT COUNT(*) FROM user WHERE user = (?)");
        $statement->bind_param("s", $user);
        $statement->execute();

        $result = $statement->get_result();
        $row = $result->fetch_assoc();

        if ($row[0] === 0) {
            echo true;
            exit();
        }

        echo false;
        exit();

    } else {
        echo "Error, missing parametrs";
        exit();
    }
} else {
        // triggers if wrong request
        echo "Error, wrong request";
        exit();
}
