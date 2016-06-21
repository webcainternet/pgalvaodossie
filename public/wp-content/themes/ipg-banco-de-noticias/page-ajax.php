<?php
/*
Template Name: Ajax
*/

$auth = array(
    'return_city'
);

$action = $_REQUEST['action'];

if (!in_array($action, $auth)) {
    echo '403';
    exit;
}

$action = 'wp_ajax_' . $action;

$action();
exit;
