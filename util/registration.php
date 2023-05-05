<?php

require "../functions.php";

if (isset($_POST["submit"])) {
    // Check if mysqli_affected_rows return value 1
    if (regis($_POST) > 0) {
        echo "<script>
                alert('Registration Successfully');
                document.location.href = '../index.php'
        </script>";
    } else {
        echo "<script>
                alert('Registration Failed');
                document.location.href = '../index.php'
        </script>";
    }
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <style>
        ul {
            list-style-type: none;
        }
    </style>
</head>

<body>

    <section>
        <h1>Registration</h1>
    </section>

    <section>
        <form action="" method="post">
            <ul>
                <li>
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" required>
                </li>
                <li>
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" required>
                </li>
                <li>
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required>
                </li>
                <li>
                    <label for="postal">Postal/Zip</label>
                    <input type="text" name="postal" id="postal" required>
                </li>
                <li>
                    <label for="country">Country</label>
                    <input type="text" name="country" id="country" required>
                </li>
                <li>
                    <button type="submit" name="submit">Register</button>
                </li>
            </ul>
        </form>

    </section>


</html>