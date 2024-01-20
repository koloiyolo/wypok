<?php
include("functions.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $post_data = [
        'title' => $title,
        'content' => $content,
        'user' => $user,
        'category' => $category
    ];
    $url = 'http://api/posts/add/';
    $response = get_post_args($url, $post_data);
    if ($response) {
        header('Location: /');
    } else {
        echo 'There was an error ' . $response;
    }
}
