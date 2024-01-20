<?php
include('functions.php');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['post_id'])) {
        $post_id = $_GET['post_id'];
        $args = ['id' => $post_id];
        
        $url = 'http://api/posts/remove/';

        $response = get_post_args($url, $args);
        if ($response) {
            header('Location: /');
        } else {
            echo var_dump($response);
        }
    }
}

?>