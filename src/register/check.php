<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['user'])) {
        $url = 'http://api/users/check/';
        $user = $_POST['user'];

        $post_data = ['user' => $user];

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

        echo json_encode($decoded_response);
        
    } else {
        echo "Error, missing parametr";
    }
} else {
    header("Location: /register/");
    echo "Error, wrong request method";
}
