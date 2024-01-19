<?php
include('comment.php');

function view_post($post) {
    echo '<div class="row post-card">';
    echo "<h2>" . $post["title"] . "</h2>";
    echo "<br>";
    echo "<p>" . $post["content"] . "</p>";
    echo "<p>Created at: " . $post["date"] . "</p>";
    echo '<hr>';

    // Retrieve and display comments for each blog post
    $post_data = ['post_id' => $post['id']];
    $api_url_comments = "http://api/comments/get/post/";
    $comments = get_post_args($api_url_comments, $post_data);

    if ($comments) {
        echo "<br>";
        echo "<h3>Comments</h3>";
        foreach ($comments as $comment) {
           view_comment($comment);
        }
    } else {
        echo "<br>";
        echo "<p>No comments yet.</p>";
    }
    echo '</div>';
}
?>