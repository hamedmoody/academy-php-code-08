<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="register.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </p>
        <p>
            <label for="password">password</label>
            <input type="password" name="password" id="password">
        </p>
        <p>
            <label for="avatar">Avatar</label>
            <input type="file" id="avatar" name="avatar" accept="image/*">
        </p>
        <input type="file" name="cert">
        <button>Register</button>
    </form>
</body>
</html>