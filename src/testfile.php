<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <div class="column">
        <?php
        include('navbar.php');
        include('functions.php');
        include('elements/post.php');

        $api_url_blogs = "http://api/posts/get/all/";
        $api_url_comments = "http://api/comments/get/post/";

        $blogs = get_post($api_url_blogs);
        if ($blogs) {
            foreach ($blogs as $blog) {
                view_post($blog);
            }
        }
        ?>
    </div>
</body>

</html>