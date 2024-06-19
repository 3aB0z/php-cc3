<?php

session_start();
if(isset($_SESSION['iduser'])) {
    require('database.php');
    $statament = $pdo->prepare("SELECT * FROM user WHERE iduser = :iduser");
    $statament->execute([
        ':iduser' => $_GET['iduser']
    ]);
    $result = $statament->fetch(PDO::FETCH_ASSOC);
}else {
    header('Location:index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50">
    <div class="w-full h-full flex flex-col justify-center items-center">
        <img class="mt-10 rounded-full" src="crystal rose swain.jpg" alt="profile-image" width="300px" height="300px">
        <h4 class="mt-4 text-gray-700 font-semibold text-4xl"><?php echo $result['username'] ?></h4>
    </div>
    <?php if($_GET['iduser'] == $_SESSION['iduser']): ?>
    <a href="" class="focus:outline-none ml-4 text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700">Delete Account</a>
    <?php endif ?>
</body>
</html>