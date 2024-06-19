<?php

session_start();

if($_SESSION['stay-signed-in'] == True) {
    require('database.php');
    $statement = $pdo -> prepare('SELECT * FROM posts');
    $statement -> execute();
    $results = $statement -> fetchAll(PDO::FETCH_ASSOC);
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
    <title>Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex w-min mt-5 ml-5 p-5 justify-between items-center bg-gray-100 rounded-2xl">
        <a class="w-20 mr-3" href="profile.php">
            <img class="w-full h-full rounded-full" src="crystal rose swain.jpg" alt="profile-picture">
        </a>
        <a class="hover:underline text-gray-700 font-semibold text-lg" href="profile.php">
            <?php echo $_SESSION['username'] ?>
        </a>
        <a href="logout.php" class="focus:outline-none ml-24 text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700">Logout</a>
        <a href="newPost.php" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 font-medium rounded-lg text-sm text-center ml-5 px-3 py-2.5 dark:bg-green-600 dark:hover:bg-green-700">New Post</a>
    </div>
    <?php foreach($results as $result): ?>
    <div class="w-full flex justify-center">
        <div class="max-w-2xl px-10 my-4 py-6 bg-white rounded-lg shadow-md">
            <div class="flex justify-between items-center flex-row">
                <h3 class="text-2xl text-gray-700 font-bold"><?php echo $result['title'] ?></h3>
                <?php if($_SESSION['iduser'] == $result['iduser']): ?>
                <form class="right-0 ml-4" action="modifierPost.php" method="POST">
                    <input type="hidden" name="idposts" value="<?php echo $result['idposts'] ?>">
                    <input type="hidden" name="title" value="<?php echo $result['title'] ?>">
                    <input type="hidden" name="content" value="<?php echo $result['content'] ?>">
                    <input type="submit" class="focus:outline-none ml-24 text-white bg-yellow-700 hover:bg-yellow-800 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-yellow-600 dark:hover:bg-yellow-700" value="Edit">
                </form>
                <form class="right-0 ml-4" action="deletePost.php" method="POST" onsubmit="confirmDelete(event)">
                    <input type="hidden" name="idposts" value="<?php echo $result['idposts'] ?>">
                    <input type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700" value="Delete">
                </form>
                <?php endif ?>
            </div>
            <p class="mt-2 text-gray-600"><?php echo $result['content'] ?></p>
            <div class="flex justify-between items-center mt-4">
                <div class="flex flex-row items-center hover:underline">
                    <a class="ml-2 mr-4" href="profile.php?iduser=<?php echo $result['iduser'] ?>">
                        <img class="w-10 h-10 object-cover rounded-full hidden sm:block" src="crystal rose swain.jpg" alt="profile-picture">
                    </a>
                    <a class="hover:underline text-gray-700 font-bold" href="profile.php?iduser=<?php echo $result['iduser'] ?>">
                        <?php
                        $statement1 = $pdo -> prepare('SELECT username FROM user WHERE iduser = :iduser');
                        $statement1 -> execute([':iduser' => $result['iduser']]);
                        $postUsername = $statement1 -> fetch(PDO::FETCH_ASSOC);
                        echo $postUsername['username'];
                        ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach ?>
    <script>
        function confirmDelete(event) {
            event.preventDefault();
            if(confirm("Are you sure you want to delete this post ?")) {
                event.target.submit();
            }
        }
    </script>
</body>
</html>