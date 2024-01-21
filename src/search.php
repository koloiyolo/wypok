<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['prompt'])) {
        $_SESSION['prompt'] = $_POST['prompt'];
        header('Location: /');
    }
}
?>