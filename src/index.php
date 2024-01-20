<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>

<body class="column">
    <?php
    include('functions.php');
    include('elements/post.php');
    if (isset($_SESSION['user_id'])) {
        include('elements/navbar1.php');
        include('elements/add_post.php');
    } else {
        include('elements/navbar0.php');
    }
    include('home.php');
    ?>

</body>

</html>