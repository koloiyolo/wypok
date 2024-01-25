<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <div class="navbar row">
        <a class="home-button button" href="/">Home</a>
        <form action="/search.php" method='post'>
        <input name="prompt" type="text" class="search-bar" placeholder="Your prompt...">
        <input type="submit" class="search-button button" value="Search">
        </form>
        <a class="game-button button" href="/game/">Are You worthy?</a>
        <a class="button" href="/panel/">Admin Panel</a>
        <p class="nick"><?php echo $_SESSION['user_id']; ?></p>
        <a class="button log_button" href="/logout/">Logout</a>
    </div>
</body>

</html>