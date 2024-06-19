<?php

session_start();
require('database.php');

$statement = $pdo -> prepare('SELECT iduser FROM user WHERE username = :username AND password = :password');

$statement -> execute([
    ':username' => $_POST['username'],
    ':password' => $_POST['password']
]);

$result = $statement -> fetch(PDO::FETCH_ASSOC);

if(isset($_POST['username']) && isset($_POST['password'])) {
    if($result) {
        $_SESSION['stay-signed-in'] = True;
        $_SESSION['iduser'] = $result['iduser'];
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        header('Location:posts.php');
        exit;
    }else {
        header('Location:index.php');
    }
}