<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    if (isset($_POST['user']) && isset($_POST['password'])) {

        header('Content-Type: application/json');
        $url = 'http://api/users/login/';
        $user = $_POST['user'];
        $password = $_POST['password'];

        $post_data = ['user' => $user,
                      'password' => $password];

        $json_content = http_build_query($post_data);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_content);
    
        $response = curl_exec($curl);
        if ($response === false) {
            echo "Error processing request";
            return false;
        }
        curl_close($curl);
        
        $decoded_response = json_decode($response, true);
        if ($decoded_response === true) {
            $_SESSION['user_id'] = $user;
            echo $_SESSION['user_id'];
            header("Location: /");
        } else {
            // Handle unsuccessful login
            header("Location: /login/");
        }


    } else {
        // handle no or missing params 
        echo "Wrong or missing arguments, please use: 'url', 'user', and 'password'. ";
    }
} else {
    // handle wrong requests
    echo "Wrong request method, please use 'POST' for safety";
}
?>