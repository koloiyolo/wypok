<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $mysqli = new mysqli("db", "root", "password", "wypok");

    // catches errors from db connections
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }



    $statement = $mysqli->prepare("SELECT * FROM message");

    $statement->execute();

    $result = $statement->get_result();
    $data = [];

    foreach ($result as $row) {
        $data[] = $row;
    }
    $statement->close();

    header('Content-Type: application/json');
    echo json_encode($data);
} else {

    // triggers if wrong request
    echo "Error, wrong request";
    exit();
}
