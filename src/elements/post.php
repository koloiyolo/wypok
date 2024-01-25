<?php
include('comment.php');
function view_post($post) {
    echo '<div class="row post-card">';
    if (isset($_SESSION['user_id'])) {
        if (isset($_SESSION['user_id']) && ($_SESSION['user_id'] === $post['user'] || $_SESSION['permission'] === 1)) {
            echo "<a class='button delete-button' href='delete_post.php?post_id=" . $post['id'] . "'> Delete </a>";
        }
    }
    echo "<h2>" . $post["title"] . "</h2>";
    echo "<h3> Created by: " . $post['user'] . "</h3>";
    echo "<p> at: " . $post["date"] . "</p>";
    echo "<br>";
    echo "<p>" . $post["content"] . "</p>";
    echo "<br>";
    echo '<hr>';

    // Retrieve and display comments for each blog post
    $post_data = ['post_id' => $post['id']];
    $api_url_comments = "http://api/comments/get/post/";
    $comments = get_post_args($api_url_comments, $post_data);
    echo "<br>";
    echo "<h3>Comments</h3>";
    echo "<form class='row' action='add_comment.php' class='row' method='post'>";
    echo "<input type='hidden' name='post_id' value='" .$post['id'] ."'>";
    echo "<input class='comment-field' type='text' name='content' placeholder='What do you think about it...'>";
    echo "<input class='comment-btn' type='submit' value='Comment'>";
    if (!isset($_SESSION['user_id'])){
       echo "<div class='g-recaptcha' data-sitekey='6LdmLFwpAAAAACn4EkUw8zswpcyKehl8jRBrdg7J'></div>"; 
    }
    echo "</form>";
    if ($comments) {
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