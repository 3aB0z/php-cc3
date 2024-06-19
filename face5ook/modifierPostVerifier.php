<?php

session_start();

require('database.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title']) && isset($_POST['content'])) {
    $statement = $pdo->prepare("UPDATE posts SET title = :title, content = :content WHERE idposts = :idposts");
    $statement->execute([
        ':title' => $_POST['title'],
        ':content' => $_POST['content'],
        ':idposts' => $_POST['idposts']
    ]);
    header('Location:posts.php');
    exit();
}else {
    header('Location:modifierPost.php');
}