<?php
require_once 'config/db.php';

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$request_uri = $_SERVER['REQUEST_URI'];
$current_url = $protocol . "://" . $host . $request_uri;

function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
$get_client_ip = get_client_ip();
$new_visit = "INSERT INTO visits (ip, url, visit_time) VALUES ('$get_client_ip', '$current_url', NOW())";
$add_new_visit = $conn->query($new_visit);
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title ?></title>
    <meta name="description" content="<?php echo $description ?>" />
    <meta name="keywords" content="<?php echo $keywords ?>" />
    <meta name="author" content="San3y Team" />
    <link rel="icon" href="<?php echo $icon ?>" type="image/x-icon" />
    <meta name="theme-color" content="#ffffff" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="twitter:card" content="<?php echo $description ?>" />
    <meta name="twitter:title" content="<?php echo $title ?>" />
    <meta name="twitter:description" content="<?php echo $description ?>" />
    <meta name="twitter:image" content="<?php echo $page_image ?>" />
    <meta property="og:title" content="<?php echo $title ?>" />
    <meta property="og:description" content="<?php echo $description ?>" />
    <meta property="og:image" content="<?php echo $page_image ?>" />
    <meta property="og:url" content="https://www.san3y.com" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="ar_EG" />
    <meta property="og:site_name" content="San3y" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/styles.css">
</head>