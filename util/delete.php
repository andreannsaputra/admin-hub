<?php

require "../functions.php";

$id = $_GET["id"];

if (delete($id) > 0) {
    echo "<script>
                alert('Delete Data Successfully');
                document.location.href = '../index.php'
        </script>";
} else {
    echo "<script>
                alert('Delete Data Failed');
                document.location.href = '../index.php'
        </script>";
};
