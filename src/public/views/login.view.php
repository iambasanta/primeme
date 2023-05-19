<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../assets/css/style.css" rel="stylesheet">
    </head>
    <body>
        <h1>Welcome to the Login page!</h1> 
        <form action="" method="POST">
            Email
            <input type="email" name="email" value="<?= $_POST['email'] ?? '' ?>" ><br>
            <?php if(isset($errors["email"])) : ?>
            <span style="font-size: 14px; color: red;"><?= $errors["email"] ?></span><br>
            <?php endif; ?>

            Password
            <input type="password" name="password" value="<?= $_POST['password'] ?? '' ?>" ><br>
            <?php if(isset($errors["password"])) : ?>
            <span style="font-size: 14px; color: red;"><?= $errors["password"] ?></span><br>
            <?php endif; ?>

            <button>Login</button><br><br>
        </form>
    </body>
</html>

