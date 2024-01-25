<?php
echo "<br>";
echo "<br>";
echo "<h1> Messages: </h1>";
$url = 'http://api/messages/get/';
$messages = get_post($url);
foreach ($messages as $message) {
    echo "<br>";
    echo "<p> <span>" . $message['user'] . "</span> has written at: " . $message['date'] . "</p>";
    echo "<p>" . $message['message'] . "</p>";
    echo "<br>";
    echo "<hr>";
}
?>
