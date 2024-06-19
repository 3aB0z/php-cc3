<?php

require('database.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idposts'])) {
    $statement = $pdo->prepare("DELETE FROM posts WHERE idposts = :idposts");
    $statement->execute([
        ':idposts' => $_POST['idposts']
    ]);
    header('Location:posts.php');
    exit();
}else {
    header('Location:modifierPost.php');
}