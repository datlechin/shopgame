<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo (isset($title)) ? $title : ''; ?> | Bảng quản trị</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo asset('assets/backend/plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset('assets/backend/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset('assets/backend/plugins/toastr/toastr.min.css'); ?>">
    <script src="<?php echo asset('assets/backend/plugins/jquery/jquery.min.js'); ?>"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="<?php echo asset('assets/backend/img/AdminLTELogo.png'); ?>" alt="AdminLTELogo" height="60" width="60">
    </div>

    <?php
    require_once 'navbar.php';
    require_once 'aside.php';
    ?>

    <div class="content-wrapper">
        <?php require_once 'content-header.php'; ?>
