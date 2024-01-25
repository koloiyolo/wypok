<?php

function get_post($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($curl);
    if ($response === false) {
        echo "Error processing request";
        return false;
    }
    curl_close($curl);
    return json_decode($response, true);
}

function get_post_args($url, $args)
{
    $post_data = $args;

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

    return json_decode($response, true);
    
}
