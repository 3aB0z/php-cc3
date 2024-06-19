<?php

session_start();

require('database.php');

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['title']) && isset($_GET['content'])) {
    $statement = $pdo->prepare("INSERT INTO posts(title, content, iduser) VALUES(:title, :content, :iduser)");
    $statement->execute([
        ':title' => $_GET['title'],
        ':content' => $_GET['content'],
        ':iduser' => $_SESSION['iduser']
    ]);
    header('Location:posts.php');
    exit();
}else {
    header('Location:newPost.php');
}