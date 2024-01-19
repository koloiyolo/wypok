<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['user']) && isset($_POST['category'])) {

        $mysqli = new mysqli("db", "root", "password", "wypok");

        // catches errors from db connections
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }

        $title = $_POST['title'];
        $content = $_POST['content'];
        $user = $_POST['user'];
        $currentDate = date("Y-m-d");
        $category = $_POST['category'];

        $statement = $mysqli->prepare("INSERT INTO post (id, title, content, date, user, category) VALUES (NULL, ?, ?, ?, ?, ?, ?)");
        $statement->bind_param("sssss", $title, $content, $currentDate, $user, $category);
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
?>