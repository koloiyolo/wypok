<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['post_id']) && isset($_POST['user']) && isset($_POST['content'])) {

        $mysqli = new mysqli("db", "root", "password", "wypok");

        // catches errors from db connections

        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }

        $post_id = $_POST['post_id'];
        $user = $_POST['user'];
        $content = $_POST['content'];
        $currentDate = date("Y-m-d");


        $statement = $mysqli->prepare("INSERT INTO comment (id, post_id, user, content, date) VALUES (NULL, ?, ?, ?, ?)");
        $statement->bind_param("iss", $post_id, $user, $content, $currentDate);

        $statement->execute();

        if ($statement->affected_rows > 0) {
            echo json_encode(true);
        } else {
            echo "Error adding record: " . $statement->error;
        }

        $statement->close();
    } else {
        echo "Not enough parametrs";
    }
} else {
    echo "Wrong request method";
}
