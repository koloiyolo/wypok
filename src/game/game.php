<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory Game in JavaScript</title>

    <link rel="stylesheet" href="assets/styles.css" />
    <link rel="stylesheet" href="/var/www/html/index.css" />
    <script src="assets/game.js" defer></script>
</head>

<body>
    <div class="game">
        <div class="controls">
            <button class="button">Start</button>
            <div class="stats">
                <div class="moves">0 moves</div>
                <div class="timer">time: 0 sec</div>
            </div>
        </div>
        <div class="board-container">
            <div class="board" data-dimension="4"></div>
            <div class="win">You won!</div>
        </div>
        <div class="leaderboard">
            <br>
            <br>
            <h1>Leaderboard:</h1>
            <br>
            <?php
            include('/var/www/html/functions.php');
            $leaderboard = get_post('http://api/leaderboard/get/');
            if ($leaderboard !== null) {
                $count = 1;
                foreach ($leaderboard as $score) {
                    echo "<p>" . $count . ". " . $score['user'] . " finished in " . $score['score'] . " moves.</p>";
                    echo "<br>";
                    $count++;
                }
            } else {
                echo "<p>No scores yet.</p>";
            }
            ?>

        </div>
    </div>
</body>

</html>