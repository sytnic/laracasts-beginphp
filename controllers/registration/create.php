<?php

// Простейший запрет на повторный доступ к странице регистрации
//if ($_SESSION['user'] ?? false) {
//    header('location: /');
//    exit();
//}

view('registration/create.view.php');
