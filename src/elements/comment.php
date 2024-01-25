<?php
function view_comment($comment)
{
    echo '<div class="row comment-card">';
    echo '<br>';
    if (isset($_SESSION['user_id'])) {
        if (isset($_SESSION['user_id']) && ($_SESSION['user_id'] === $comment['user'] || $_SESSION['permission'] === 1)) {
            echo "<a class='button delete-button' href='delete_comment.php?comment_id=" . $comment['id'] . "'> Delete </a>";
        }
    }
    echo "<p><strong>" . $comment["user"] . "</strong> said:</p>";
    echo '<br>';
    echo "<p>" . $comment["content"] . "</p>";
    echo '<br>';
    echo '<hr>';
    echo '</div>';
}
