<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['post_id'])) {

        $mysqli = new mysqli("db", "root", "password", "wypok");

        // catches errors from db connections
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }

        $post_id = $_POST['post_id'];

        $statement;
        if (isset($_POST['by'])) {
            $by = $_POST['by'];

            if (isset($_POST['order'])) {

                // order by with param

                $order = $_POST['order'];
                $statement = $mysqli->prepare("SELECT COUNT(id) FROM comment WHERE post_id = ? ORDER BY (?) (?)");
                $statement->bind_param("sss",$post_id , $by, $order);
            } else {

                // default order by

                $statement = $mysqli->prepare("SELECT COUNT(id) FROM comment WHERE post_id = ? ORDER BY (?)");
                $statement->bind_param("ss", $post_id, $by);
            }
        } else {

            // default select

            $statement = $mysqli->prepare("SELECT COUNT(id) FROM comment WHERE post_id = ?");
            $statement->bind_param("s", $post_id);
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

        echo "Error, wrong arguments";
    }
} else {

    // triggers if wrong request
    echo "Error, wrong request";
    exit();
}
