<?php

require_once '../../bootstrap.php';

if (!$userClass->isAdmin()) {
    redirect('/');
}

require_once '../../views/admin/dashboard.php';