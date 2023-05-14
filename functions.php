<?php

$conn = mysqli_connect("localhost", "root", "", "adminhub");

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
};

function insert($data)
{
    global $conn;

    $name = htmlspecialchars($data["name"]);
    $phone = htmlspecialchars($data["phone"]);
    $email = htmlspecialchars($data["email"]);
    $postalZip = htmlspecialchars($data["postalZip"]);
    $country = htmlspecialchars($data["country"]);

    $query = " INSERT INTO myTable
                VALUES
                ('', '$name', '$phone','$email','$postalZip','$country')
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
};

function delete($id)
{
    global $conn;
    $query = "DELETE FROM myTable WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
};

function update($data)
{
    global $conn;

    $id = $data["id"];
    $name = htmlspecialchars($data["name"]);
    $phone = htmlspecialchars($data["phone"]);
    $email = htmlspecialchars($data["email"]);
    $postalZip = htmlspecialchars($data["postalZip"]);
    $country = htmlspecialchars($data["country"]);

    $query = " UPDATE myTable SET
                name = '$name',
                phone = '$phone',
                email = '$email',
                postalZip = '$postalZip',
                country = '$country'
                WHERE id = '$id'
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
};

function search($keyword)
{
    $query = "SELECT * FROM myTable WHERE 
    name LIKE '%$keyword%' OR
    phone LIKE '%$keyword%' OR
    email LIKE '%$keyword%' OR
    country LIKE '%$keyword%'
                ";
    return query($query);
}

function registration($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $confirm_password = mysqli_real_escape_string($conn, $data["confirm_password"]);

    $result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username telah terdaftar')
                </script>";
        return false;
    }

    if ($password !== $confirm_password) {
        echo "<script>
                alert('konfirmasi password tidak sesuai')
                </script>";
        return false;
    }

    // Encryption Password
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO admin VALUES ('','$username','$password')");

    return mysqli_affected_rows($conn);
}
