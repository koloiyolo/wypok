<?php
function view_comment($comment) {
    echo '<div class="row comment-card">';
    echo '<br>';
    echo "<p><strong>" . $comment["user"] . "</strong> said:</p>";
    echo "<p>" . $comment["content"] . "</p>";
    echo "<p>Commented at: " . $comment["date"] . "</p>";
    echo '<br>';
    echo '<hr>';
    echo '</div>';
}
?>