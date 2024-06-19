<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <form class="flex justify-center items-center w-full h-screen" action="newPostVerifier.php" method="get">
        <div class="flex justify-between items-center flex-col w-1/3 h-[80%] p-8 bg-slate-100 rounded-3xl">
            <h1 class="text-yellow-500 text-4xl">Add a new Post</h1>
            <div>
                <label for="title">Title :</label>
                <input class="outline-neutral-400 border-x-[3px] border-y-[3px] rounded-lg" type="text" name="title">
            </div>
            <div class="flex items-center flex-row">
                <label for="title">Content :</label>
                <textarea class="outline-neutral-400 border-x-[3px] border-y-[3px] rounded-lg" name="content"></textarea>
            </div>
            <input class="bg-yellow-400 rounded-lg px-5 py-2" type="submit" value="Add">
        </div>
    </form>
</body>
</html>