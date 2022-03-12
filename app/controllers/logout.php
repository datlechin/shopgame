<?php

require_once '../bootstrap.php';

if (!isLoggedIn()) {
    redirect('/login');
}

session_destroy();
redirect('/login');