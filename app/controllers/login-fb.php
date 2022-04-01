<?php

/**
 * Mã nguồn shop bán tài khoản game
 * @author Ngô Quốc Đạt <datlechin@gmail.com>
 * @copyright 2022
 * Vui lòng không xóa các dòng này
 */

use Facebook\Facebook;

require_once '../bootstrap.php';

if ($userClass->isLoggedIn()) {
    redirect('/');
}

$fb = new Facebook([
    'app_id' => setting('facebook_app_id'),
    'app_secret' => setting('facebook_app_secret'),
    'default_graph_version' => 'v6.0',
]);
$helper = $fb->getRedirectLoginHelper();


if (isset($_GET['code'])) {
    $helper = $fb->getRedirectLoginHelper();
    try {
        $accessToken = $helper->getAccessToken();
        $response = $fb->get('/me?fields=id,name,email', $accessToken);
    } catch (\Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch (\Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

    $grabUser = $response->getGraphUser();
    $name = $grabUser->getName();
    $email = $grabUser->getEmail();
    $id = $grabUser->getId();

    $userExists = $db->has('users', ['email' => $email]);
    if ($userExists) {
        $user = $userClass->findByEmail($email);
        $db->update('users', [
            'facebook_id' => $id,
            'name' => $name,
        ], ['id' => $user->id]);
        $_SESSION['user_id'] = $user['id'];
        redirect('/');
    } else {
        $username = $id . '@facebook.com';
        $db->insert('users', [
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'phone' => null,
            'password' => null,
            'facebook_id' => $id,
        ]);
        $_SESSION['user_id'] = $db->id();
        redirect('/');
    }
} else {
    $permissions = ['email'];
    $loginUrl = $helper->getLoginUrl(site_url('login-fb'), $permissions);
    redirect($loginUrl);
}