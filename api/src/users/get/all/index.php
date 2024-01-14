<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $mysqli = new mysqli("db", $_POST['user'], $_POST['password'], "wypok");

    // catches errors from db connections
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    $statement;
    if (isset($_POST['by'])) {
        $by = $_POST['by'];

        if (isset($_POST['order'])) {

            // order by with param

            $order = $_POST['order'];
            $statement = $mysqli->prepare("SELECT * FROM user ORDER BY (?) (?)");
            $statement->bind_param("ss", $by, $order);
        } else {

            // default order by

            $statement = $mysqli->prepare("SELECT * FROM user ORDER BY (?)");
            $statement->bind_param("ss", $by);
        }
    } else {

        // default select

        $statement = $mysqli->prepare("SELECT * FROM user");
    }
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
