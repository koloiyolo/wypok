<?php
session_start();
include('/functions.php');
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    } else {
        $user = 'Anonymous';
    }
    $post_id = $_POST['post_id'];
    $content = $_POST['content'];

    $post_data = ['user' => $user,
                  'post_id' => $post_id,
                  'content' => $content];

    $url = 'http://api/posts/add/';
    if (json_decode($response = get_post_args($url, $post_data))) {
        header('Location: /');
    } else {
        echo 'There was an error';
    }
}

?>