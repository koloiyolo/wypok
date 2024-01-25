
<?php
echo "<br>";
echo "<br>";
echo "<h1> Users: </h1>";
$url = 'http://api/users/get/all/';
$users = get_post($url);
foreach ($users as $user) {
    echo "<br>";
    echo "<div class='row'>";
    if ($_SESSION['user_id'] !== $user['user']) {
        if ($user['permission'] === 0) {
            echo "<a class='button perm-btn' href='perm.php?id=" . $user['user'] . "&level=". $user['permission']. "'>Promote</a>";
        } else if ($user['permission'] === 1) {
            echo "<a class='button perm-btn' href='perm.php?id=" . $user['user'] . "&level=". $user['permission']. "'>Demote</a>";
        }
        echo "<a class='button' href='delete_user.php?id=" . $user['user'] . "'>Delete</a>";
    }
    echo "<p> <span>" . $user['user'] . "</span> email: <span>" . $user['email'] . "</span> permission level: " . $user['permission'] . " created at " . $user['created'] . "</p>";
    echo "<br>";
    echo "<hr>";
    echo "</div>";
}
?>
