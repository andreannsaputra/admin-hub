<?php

require "../functions.php";

if (isset($_POST["submit"])) {
    // Check if mysqli_affected_rows return value 1
    if (insert($_POST) > 0) {
        echo "<script>
                alert('Insert Data Successfully');
                document.location.href = '../index.php'
        </script>";
    } else {
        echo "<script>
                alert('Insert Data Failed');
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
            <table>
                <tr>
                    <td class="label">
                        <label for="name">Nama</label>
                    </td>
                    <td class="input">
                        <input type="text" name="name" id="name" required>
                    </td>
                </tr>
                <tr>
                    <td class="label">
                        <label for="phone">Phone</label>
                    </td>
                    <td class="input">
                        <input type="text" name="phone" id="phone" required>
                    </td>
                </tr>
                <tr>
                    <td class="label">
                        <label for="email">Email</label>
                    </td>
                    <td class="input">
                        <input type="text" name="email" id="email" required>
                    </td>
                </tr>
                <tr>
                    <td class="label">
                        <label for="postal">Postal/Zip</label>
                    </td>
                    <td class="input">
                        <input type="text" name="postal" id="postal" required>
                    </td>
                </tr>
                <tr>
                    <td class="label">
                        <label for="country">Country</label>
                    </td>
                    <td class="input">
                        <input type="text" name="country" id="country" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="submit">Register</button>
                    </td>
                </tr>
            </table>
        </form>

    </main>


</html>