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
