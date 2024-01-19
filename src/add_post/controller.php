<?php
session_start();
include('/functions.php');
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_SESSION['user'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];


    $post_data = ['user' => $user,
                  'title' => $title,
                  'content' => $content,
                  'category' => $category];

    $url = 'http://api/posts/add/';
    if (json_decode($response = get_post_args($url, $post_data))) {
        header('Location: /');
    } else {
        echo 'There was an error';
    }
}

?>