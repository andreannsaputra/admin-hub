<?php

session_start();

if (isset($_SESSION["login"])) {
    header("Location : ../index.php");
    exit;
}

require "../functions.php";

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result_username = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

    if (mysqli_num_rows($result_username) === 1) {

        $row = mysqli_fetch_assoc($result_username);
        if (password_verify($password, $row["password"])) {

            $_SESSION["login"] = true;

            header("Location: ../index.php");
            exit;
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Hub</title>
</head>

<body>
    <?php if (isset($error)) : ?>
        <p style="color: red; font-style :italic;">username / password salah</p>
    <?php endif ?>

    <div class="container">
        <form action="" method="post">
            <ul>
                <li>
                    <label for="username">Username :</label>\
                    <input type="text" name="username" id="username">
                </li>
                <li>
                    <label for="password">Password :</label>\
                    <input type="password" name="password" id="password">
                </li>
                <li>
                    <button type="submit" name="login">Login</button>
                </li>
            </ul>
        </form>
    </div>

</body>

</html>