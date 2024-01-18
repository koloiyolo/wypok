<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['user']) && isset($_POST['password'])) {

        $user = $_POST['user'];
        $password = $_POST['password'];

        $mysqli = new mysqli("db", "root", "password", "wypok");

        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }

        $statement = $mysqli->prepare("SELECT password FROM user WHERE user = (?)");
        $statement->bind_param("s", $user);
        $statement->execute();

        $result = $statement->get_result();
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            echo json_encode(true);
            exit();
        }

        echo json_encode(false);
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
