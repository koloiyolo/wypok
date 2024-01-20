<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
</head>

<body>
    <form class="form-card" action="/add_post.php" method="post">
        <div class="column">
            <br>
            <h3>What's on your mind?</h3>
            <input type="text" id="title" name="title" required placeholder="Your title..."><br>
            <textarea id="content" name="content" required placeholder="Your text..."></textarea><br>
            <input type="text" id="title" name="category" required placeholder="Category: "><br>
            <input type="hidden" name="user" value=<?php echo $_SESSION['user_id']; ?>>
            <input type="submit" value="Submit">
        </div>
    </form>

</body>

</html>