<?php
include('functions.php');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['comment_id'])) {
        $comment_id = $_GET['comment_id'];
        $args = ['id' => $comment_id];
        
        $url = 'http://api/comments/remove/';

        $response = get_post_args($url, $args);
        if ($response) {
            header('Location: /');
        } else {
            echo var_dump($response);
        }
    }
}

?>