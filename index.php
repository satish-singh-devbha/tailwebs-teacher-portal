<?php
session_start();


$config = include_once __DIR__ . '/config/config.php';

if (isset($_SESSION['teacher_id'])) {
    header('Location: home.php');
} else {
    header('Location: /auth/login.php');
}


