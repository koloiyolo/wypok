<?php
session_start();
if (isset($_SESSION['user_id'])) {
    include('/var/www/html/elements/navbar1.php');
    include('game.php');
} else {
    header('Location: /');
}
?>