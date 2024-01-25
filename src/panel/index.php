<?php
session_start();
include('/var/www/html/functions.php');
if (isset($_SESSION['permission']) && $_SESSION['permission'] === 1) {
} else {
    header('Location: /');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="/index.css">
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>

<body>
    <div class="column">
        <?php
        include('/var/www/html/elements/navbar2.php');
        ?>
        <div class="content column">
            <div class="users">
                <?php
                include('users.php');
                ?>
            </div>
            <div class="messages">
                <?php
                include('messages.php');
                ?>
            </div>
        </div>
    </div>
</body>

</html>