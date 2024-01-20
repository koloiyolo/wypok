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
        <a class="add-button button" href="/">Reload</a>
        <input type=text class="search-bar" placeholder="Your prompt...">
        <a class="search-button button">Search</a>
        <p class="nick"><?php echo $_SESSION['user_id']; ?></p>
        <a class="button log_button" href="/logout/">Logout</a>
    </div>
</body>

</html>