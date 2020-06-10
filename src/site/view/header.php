<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v3.0.0
* @link https://coreui.io
* Copyright (c) 2020 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<html lang="en">

<head>
    <base href="/public/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>
        <?=$title ?>
    </title>
    <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Main styles for this application-->
    <link href="css/style.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        // Shared ID
        gtag('config', 'UA-118965717-3');
        // Bootstrap ID
        gtag('config', 'UA-118965717-5');
    </script>
    <link href="vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
</head>

<body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
        <div class="c-sidebar-brand d-lg-down-none">
            <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="assets/brand/coreui.svg#full"></use>
            </svg>
            <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
                <use xlink:href="assets/brand/coreui.svg#signet"></use>
            </svg>
        </div>
        <ul class="c-sidebar-nav">
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="../index.php">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                    </svg> Dashboard</a>
            </li>
            <li class="c-sidebar-nav-title">Tools</li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="../index.php?c=assignment">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chart-pie"></use>
                    </svg> Assignment</a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="../index.php?c=challenge">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chart-pie"></use>
                    </svg> Challenge</a>
            </li>

            <!-- <li class="c-sidebar-nav-divider"></li>
            <li class="c-sidebar-nav-title">Extras</li> -->
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="../index.php?c=message">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chart-pie"></use>
                    </svg> Message </a>
            </li>
            <?php if (isset($_SESSION['role']) and $_SESSION['role'] === 0): ?>
                <li class="c-sidebar-nav-divider"></li>
                <li class="c-sidebar-nav-title">Admin</li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="../index.php?c=signup">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chart-pie"></use>
                        </svg> Add User </a>
                </li>
              <?php
endif; ?>

        </ul>
        <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
    </div>
    <div class="c-wrapper c-fixed-components">
        <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
            <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
                <svg class="c-icon c-icon-lg">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                </svg>
            </button>
            <a class="c-header-brand d-lg-none" href="#">
                <svg width="118" height="46" alt="CoreUI Logo">
                    <use xlink:href="assets/brand/coreui.svg#full"></use>
                </svg>
            </a>
            <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
                <svg class="c-icon c-icon-lg">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                </svg>
            </button>
            <ul class="c-header-nav ml-auto mr-4">
            <li class="c-header-nav-item dropdown d-md-down-none mx-2 show"><a class="c-header-nav-link" data-toggle="dropdown"  role="button" aria-haspopup="true" aria-expanded="true">
                    <svg class="c-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                    </svg><span class="badge badge-pill badge-info"><?= count($unchecked_message) ?></span></a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0">
                    <div class="dropdown-header bg-light"><strong>You have <?= count($unchecked_message) ?> new inboxs</strong></div>
                    <form action="../index.php" method="GET" id='header_read_message'>
                        <input type='text' style='display:none' name='c' value='message'>
                        <input type='text' style='display:none' name='id' id='header_id'>
                    </form>
                    <?php foreach($unchecked_message as $sender_id=>$message): ?>
                    <div class="dropdown-item">
                        <div class="message" style="width:400px" onclick="submit_form('header_read_message','header_id',<?= $sender_id ?>)">
                        <div class="py-3 mfe-3 float-left">
                        <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/<?= $sender_id%8+1;?>.jpg" alt="user@email.com"><span class="c-avatar-status bg-success"></span></div>
                        </div>
                        <div><small class="text-muted"><?= count($message['message']) ?> new messages</small><small class="text-muted float-right mt-1"><?= date('g:i a',$message['message'][0]['timestamp'])?>    |    <?= date('M j',$message['message'][0]['timestamp'])?></small></div>
                        <div class="text-truncate font-weight-bold"><span class="text"><?= htmlentities($message['fullname'],ENT_QUOTES, "UTF-8") ?></span> </div>
                        <div class="small text-muted text-truncate"><?= htmlentities($message['message'][0]['message'], ENT_QUOTES, "UTF-8") ?></div>
                        </div></div>
                    <?php endforeach;?>
                    <a class="dropdown-item text-center border-top" href="../index.php?c=message"><strong>View all messages</strong></a>
                    </div>
                </li>
                <li class="c-header-nav-item dropdown">
                    <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/<?= $header['user']['id']%8 +1?>.jpg" alt="user@email.com"></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right pt-0">
                        <div class="dropdown-header bg-light py-2"><strong><?= htmlspecialchars($header['user']['fullname'], ENT_QUOTES, 'UTF-8'); ?></strong></div>
                        <a class="dropdown-item" href="../index.php?c=info&id=<?= $header['user']['id']?>">
                        <svg class="c-icon mfe-2">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                        </svg> Profile</a>
                        <a class="dropdown-item" href="../index.php?c=message">
                        <svg class="c-icon mfe-2">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                        </svg> Messages<span class="badge badge-success mfs-auto"></span></a>
                        <a class="dropdown-item" href="../index.php?c=update">
                        <svg class="c-icon mfe-2">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                        </svg> Account</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../index.php?c=logout">
                            <svg class="c-icon mr-2">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                            </svg> Logout</a>
                    </div>
                </li>
            </ul>
            <div class="c-subheader px-3">
                <!-- Breadcrumb-->
                <ol class="breadcrumb border-0 m-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Dashboard</li>
                    <!-- Breadcrumb Menu-->
                </ol>
            </div>
        </header>
        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    <div class="fade-in">