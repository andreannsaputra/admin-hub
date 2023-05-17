<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location : util/login.php");
    exit;
}

require "../functions.php";

$id = $_GET["id"];

$data = query("SELECT * FROM myTable WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    // Check if mysqli_affected_rows return value 1
    if (update($_POST) > 0) {
        echo "<script>
                alert('Update Data Successfully');
                document.location.href = '../index.php'
        </script>";
    } else {
        echo "<script>
                alert('Update Data Failed');
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
        * {
            margin: 0;
            padding: 0;
        }

        body {
            width: 800px;
            height: auto;
            margin: 25px auto;
            border: 1px solid black;
        }

        ul {
            list-style-type: none;
        }

        table {
            margin: 8px 16px;
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
        }

        td {
            margin: 0 16px;
        }

        td.label {
            padding: 4px 0px;
            padding-left: 16px;
        }

        td input {
            width: 100%;

        }
    </style>
</head>

<body>

    <header>
        <h1>Registration</h1>
    </header>

    <main>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $data['id']; ?>">
            <table>
                <tr>
                    <td class="label">
                        <label for="name">Nama</label>
                    </td>
                    <td class="input">
                        <input type="text" name="name" id="name" required value="<?= $data["name"]; ?>">
                    </td>
                </tr>
                <tr>
                    <td class="label">
                        <label for="phone">Phone</label>
                    </td>
                    <td class="input">
                        <input type="text" name="phone" id="phone" required value="<?= $data["phone"]; ?>">
                    </td>
                </tr>
                <tr>
                    <td class="label">
                        <label for="email">Email</label>
                    </td>
                    <td class="input">
                        <input type="text" name="email" id="email" required value="<?= $data["email"]; ?>">
                    </td>
                </tr>
                <tr>
                    <td class="label">
                        <label for="postal">Postal/Zip</label>
                    </td>
                    <td class="input">
                        <input type="text" name="postal" id="postal" required value="<?= $data["postalZip"]; ?>">
                    </td>
                </tr>
                <tr>
                    <td class="label">
                        <label for="country">Country</label>
                    </td>
                    <td class="input">
                        <input type="text" name="country" id="country" required value="<?= $data["country"]; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="submit">Update</button>
                    </td>
                </tr>
            </table>
        </form>

    </main>


</html>