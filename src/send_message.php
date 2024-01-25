<?php
session_start();
include('functions.php');
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['message'])) {
        $url = 'http://api/messages/add/';
        $message = $_POST['message'];
        $user = $_SESSION['user_id'];
        $args = ['user' => $user,
                'message' => $message,];
        $response = get_post_args($url, $args);

        if ($response) {
            header('Location: /');
        } else {
            echo "There was an error" . var_dump($response);
        }
    }
}