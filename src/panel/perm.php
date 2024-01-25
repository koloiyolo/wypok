<?
include('/var/www/html/functions.php');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id']) && isset($_GET['level'])) {
        $level;
        if ($_GET['level'] == 0) {
            $level = 1;
        } else if ($_GET['level'] == 1) {
            $level = 0;
        }
        $args = ['user' => $_GET['id'],
                'level' => $level];
        $url = 'http://api/users/edit/perm/';
        $response = get_post_args($url, $args);

        if ($response === true) {
            header('Location: /panel/');
        } else {
            echo "There was an error";
        }
    }
}
