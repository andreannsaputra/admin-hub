<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location : util/login.php");
    exit;
}



require "functions.php";

$data = query("SELECT * FROM mytable");

if (isset($_POST["search"])) {
    $data = search($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <!-- My CSS -->
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <div class="container">
        <header>
            <h1>Admin</h1>
            <a href="util/logout.php">Log Out</a>
        </header>
        <main>
            <ul class="search">
                <li>
                    <form action="" method="post">
                        <input type="text" name="keyword" placeholder="Search" autocomplete />
                        <button type="submit" name="search">Search</button>
                    </form>
                </li>
            </ul>
            <ul class="regis">
                <li>
                    <a href="util/insert.php">
                        <button>+ Registration</button>
                    </a>

                </li>
            </ul>
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Postal/Zip</th>
                    <th>Country</th>
                    <th>Edit</th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row["name"]; ?></td>
                        <td><?= $row["phone"]; ?></td>
                        <td><?= $row["email"]; ?></td>
                        <td><?= $row["postalZip"]; ?></td>
                        <td><?= $row["country"]; ?></td>
                        <td><a href="util/update.php?id=<?= $row["id"]; ?>">Update</a> |
                            <a href="util/delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Are you sure ?');">Delete</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </table>
        </main>
        <footer>
            <p>Made by andre</p>
        </footer>

    </div>

</body>

</html>