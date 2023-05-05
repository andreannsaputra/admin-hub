<?php
include "functions.php";

$data = query("SELECT * FROM mytable");

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
    <section>
        <h1>Admin</h1>
    </section>
    <section>
        <div class="search">
            <li>
                <ul>
                    <form action="" method="get"></form>
                    <input type="text" class="input" placeholder="Search" />
                </ul>
                <ul>
                    <input type="submit" value="Search" />
                </ul>
            </li>
        </div>
        <div class="table">
            <table>
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
                        <td><a href="#">Update</a> | <a href="#">Delete</a></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </table>
        </div>
    </section>
</body>

</html>