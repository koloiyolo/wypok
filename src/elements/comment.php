<?php
function view_comment($comment) {
    echo '<div class="row comment-card">';
    echo "<p><strong>" . $comment["user"] . "</strong> said:</p>";
    echo "<p>" . $comment["content"] . "</p>";
    echo "<p>Commented at: " . $comment["date"] . "</p>";
    echo '</div>';
}
?>