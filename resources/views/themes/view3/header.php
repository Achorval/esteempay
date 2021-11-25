<?php
$balance = $this->model->viewBalanceOf("USD",$_SESSION['UserID']); 

$user_data = $this->model->getUser($_SESSION['UserID']);

foreach($user_data as $keyD => $valueD){

  $email = $valueD['email'];

}
?>
<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>EsteemPay</title>
    <meta name="description" content="EsteemPay - Blockchain Payment Platform">
    <meta name="keywords" content="crypto payment, send crypto, blockchain payments" />
    <link rel="icon" type="image/png" href="<?php echo BASE_URL.USER_THEME; ?>assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="<?php echo BASE_URL.USER_THEME; ?>assets/css/style.css">
    <link rel="manifest" href="<?php echo BASE_URL.USER_THEME; ?>__manifest.json">
</head>

<body style="overflow:scroll; overflow-y: scroll!important;">

    <!-- loader -->
    <div id="loader">
        <img src="<?php echo BASE_URL.USER_THEME; ?>assets/img/logo-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->
    
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            <img src="<?php echo BASE_URL.USER_THEME; ?>assets/img/logo.png" alt="logo" class="logo">
        </div>
        <!--
        <div class="right">
            <a href="app-notifications.html" class="headerButton">
                <ion-icon class="icon" name="notifications-outline"></ion-icon>
                <span class="badge badge-danger">4</span>
            </a>
            <a href="app-settings.html" class="headerButton">
                <img src="<?php echo BASE_URL.USER_THEME; ?>assets/img/sample/avatar/avatar1.jpg" alt="image" class="imaged w32">
                <span class="badge badge-danger">6</span>
            </a>
        </div>
        -->
    </div>