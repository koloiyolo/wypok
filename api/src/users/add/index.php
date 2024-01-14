<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['user']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['permission'])) {

        $mysqli = new mysqli("db", "root", "password", "wypok");

        // catches errors from db connections
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }

        $user = $_POST['user'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $permission = $_POST['permission'];
        $currentDate = date("Y-m-d");

        if (isset($_POST['description'])) {

            $description = $_POST['description'];
            $statement = $mysqli->prepare("INSERT INTO user (user, email, password, permission, created, description) VALUES (?, ?, ?, ?, ?, ?)");
            $statement->bind_param("sssiss", $user, $email, $password, $permission, $currentDate, $description);
        } else {
            $statement = $mysqli->prepare("INSERT INTO user (user, email, password, permission, created) VALUES (?, ?, ?, ?, ?)");
            $statement->bind_param("sssis", $user, $email, $password, $permission, $currentDate); 
        }

        $statement->execute();

        if ($statement->affected_rows > 0) {
            echo json_encode(true);
        } else {
            echo json_encode($error);
        }

        $statement->close();

    } else {
        echo "Not enough parametrs";
    }
} else {
    echo "Wrong request method";
}
?>