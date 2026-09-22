<?php

session_start();

if (!$_SESSION['logado']) {
    header('Location: ../auth/login.php');
    exit();
}