<?php

session_start();
require('database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileType = $_FILES['file']['type'];
        $fileContent = addslashes(file_get_contents($fileTmpName));

        $statement = $pdo -> prepare("INSERT INTO profile_image (iduser, name, image) VALUES (:iduser, :fileName, :fileContent)");
        
        $statement -> execute([
            ':iduser' => $_SESSION['iduser'],
            ':fileName' => $fileName,
            ':fileContent' => $fileContent
        ]);
        
        $result = $statement -> fetchAll(PDO::FETCH_ASSOC);

        if (isset($result)) {
            echo "File uploaded and saved to database.";
            header('Location:posts.php');
        } else {
            echo "There is an error.";
        }
    } else {
        echo "No file uploaded or there was an upload error.";
    }
}