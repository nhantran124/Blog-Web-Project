<?php
require '../partials/header.php';
if(!isset($_SESSION['user-id'])) {
    header('Location: ' . ROOT_URL . 'sign-in.php');
    die();
}
