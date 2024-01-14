<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['user'])) {

        $mysqli = new mysqli("db", "root", "password", "wypok");

        // catches errors from db connections
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }

        $user = $_POST['user'];

        $statement;
        if (isset($_POST['by'])) {
            $by = $_POST['by'];

            if (isset($_POST['order'])) {

                // order by with param

                $order = $_POST['order'];
                $statement = $mysqli->prepare("SELECT * FROM user WHERE user = (?) ORDER BY (?) (?)");
                $statement->bind_param("sss", $user, $by, $order);

            } else {

                // default order by

                $statement = $mysqli->prepare("SELECT * FROM user WHERE user = (?) ORDER BY (?)");
                $statement->bind_param("ss", $user, $by);

            }
        } else {

            // default select

            $statement = $mysqli->prepare("SELECT * FROM user WHERE user = (?)");
            $statement->bind_param("s", $user);
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

        // triggersd if no credentials in request
        echo "No credentials, access denied";
        exit();
    }
} else {

    // triggers if wrong request
    echo "Error, wrong request";
    exit();
}

?>