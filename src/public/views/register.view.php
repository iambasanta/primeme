<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../assets/css/style.css" rel="stylesheet">
    </head>
    <body>
        <h1>Welcome to the Register page!</h1> 
        <form action="" method="POST">
            Username
            <input type="text" name="username" value="<?= $_POST['username'] ?? '' ?>" required><br>
            <?php if(isset($errors["username"])) : ?>
            <span style="font-size: 14px; color: red;"><?= $errors["username"] ?></span><br>
            <?php endif; ?>

            Email
            <input type="email" name="email" value="<?= $_POST['email'] ?? '' ?>" required><br>
            <?php if(isset($errors["email"])) : ?>
            <span style="font-size: 14px; color: red;"><?= $errors["email"] ?></span><br>
            <?php endif; ?>

            Password
            <input type="password" name="password" value="<?= $_POST['password'] ?? '' ?>" required><br>
            <?php if(isset($errors["password"])) : ?>
            <span style="font-size: 14px; color: red;"><?= $errors["password"] ?></span><br>
            <?php endif; ?>

            Confirm Password
            <input type="password" name="confirm_password" required><br>
            <?php if(isset($errors["confirm_password"])) : ?>
            <span style="font-size: 14px; color: red;"><?= $errors["confirm_password"] ?></span><br>
            <?php endif; ?>

            Avatar
            <input type="file" name="avatar"><br><br>
            <button>Register</button><br><br>
        </form>
    </body>
</html>

