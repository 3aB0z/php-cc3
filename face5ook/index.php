<?php
session_start();
if(isset($_SESSION['stay-signed-in'])) {
    if($_SESSION['stay-signed-in']) {
        header('Location:posts.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-lg">
            <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">Login</h1>
            <form action="verifier.php" method="post" class="mb-0 mt-6 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8">
                <div>
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" placeholder="Username" name="username"/>
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"placeholder="Enter password" name="password"/>
                </div>
                <button type="submit" class="block w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white">Sign in</button>
            </form>
        </div>
    </div>
</body>
</html>