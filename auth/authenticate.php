<?php
session_start();

$url = "http://localhost:7777/api/auth/user-profile";
$ch = curl_init($url);

if (isset($_GET['access_token'])) {

    $headers = [
        'Authorization: Bearer ' . $_GET['access_token'],
    ];

    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HEADER, $headers);

    $output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($httpcode == 200) {
        $user = json_decode($output);
    
        session_destroy();
        $_SESSION['access_token'] = $_GET['access_token'];
        $_SESSION['user'] = $user;
    } else {
        header('Location: ' . "http://localhost:8000/login");
    }

} else if (isset($_SESSION['access_token'])) {
    $headers = [
        'Authorization: Bearer ' . $_SESSION['access_token'],
    ];

    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HEADER, $headers);

    $output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($httpcode != 200) {
        session_destroy();
        header('Location: ' . "http://localhost:8000/login");
    }
} else {
    curl_close($ch);
    header('Location: ' . "http://localhost:8000/login");
}
