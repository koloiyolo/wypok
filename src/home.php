
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <div class="column content">
        <?php
        $api_url_comments = "http://api/comments/get/post/";
        if (isset($_SESSION['prompt'])) {
            $api_url_blogs = "http://api/posts/get/all/";
            $prompt = $_SESSION['prompt'];
            $args = ['prompt' => $_SESSION['prompt']];
            $blogs = get_post_args($api_url_blogs = "http://api/posts/get/search/", $args);
            unset($_SESSION['prompt']);
        } else {
            $api_url_blogs = "http://api/posts/get/all/";
            $blogs = get_post($api_url_blogs);
        }
        if ($blogs) {
            foreach ($blogs as $blog) {
                view_post($blog);
            }
        }
        ?>
    </div>
</body>

</html>