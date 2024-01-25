<?
include('/var/www/html/functions.php');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        echo $_GET['id'];
        $args = ['user' => $_GET['id']];
        $url = 'http://api/users/remove/';
        $response = get_post_args($url, $args);

        if ($response === true) {
            header('Location: /');
        } else {
            echo "There was an error";
        }
    }
}
