<?php
session_start();
include('/var/www/html/functions.php');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['score'])) {
        $score = $_GET['score'];
        $user = $_SESSION['user_id'];
        $args = ['score' => $score,
                 'user' => $user];

        $url ='http://api/leaderboard/add/';
        if ($response = get_post_args($url, $args)) {
            header('Location: /game/');
        } else {
            // echo $user . " " . $score;
            echo 'There was an error';
        }

    }
}
?>