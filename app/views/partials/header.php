<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo (isset($title)) ? $title : ''; ?> - <?php echo setting('title'); ?></title>
    <meta name="description" content="<?php echo setting('description'); ?>">
    <meta name="keywords" content="<?php echo setting('keywords'); ?>">
    <meta name="author" content="Ngô Quốc Đạt">
    <link rel="shortcut icon" href="/assets/frontend/img/mdb-favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/assets/frontend/css/mdb.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            padding-top: 4.3rem;
        }
    </style>
</head>
<body>
<?php
require_once 'navbar.php';
?>