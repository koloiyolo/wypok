<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
</head>
<body>

    <h1>Add Post</h1>

    <form action="process_post.php" method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="category">Category</label>
        <textarea id="content" name="content" required></textarea><br>

        <input type="submit" value="Submit">
    </form>

</body>
</html>
