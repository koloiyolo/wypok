<?php
session_start();

if (isset($_SESSION['user_id'])) {
    include('logged.php');
} else {
    include('not_logged.php');
}
?>
