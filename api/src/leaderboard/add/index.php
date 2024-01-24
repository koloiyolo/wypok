<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['user']) && isset($_POST['score'])) {

        $mysqli = new mysqli("db", "root", "password", "wypok");

        // catches errors from db connections
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }

        $user = $_POST['user'];
        $score = $_POST['score'];

        $statement = $mysqli->prepare("INSERT INTO leaderboard (user, score) VALUES (?, ?)");
        $statement->bind_param("si", $user, $score);
        $statement->execute();
        if ($statement->affected_rows > 0) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
        $statement->close();

    } else {
        echo "Not enough parametrs";
    }
} else {
    echo "Wrong request method";
}
?>