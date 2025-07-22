<?php
include('db.php');

if (isset($_POST['update_student'])) {
    $id = $_POST['id'];
    $fname = trim($_POST['first_name']);
    $lname = trim($_POST['last_name']);
    $age = trim($_POST['age']);

    if (empty($fname) || empty($lname) || empty($age)) {
        header("Location: update_page_1.php?id=$id&error=Please+fill+all+fields");
        exit();
    }

    $query = "UPDATE students SET first_name='$fname', last_name='$lname', age='$age' WHERE id='$id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        header("Location: page.php?success=Student+updated+successfully");
    } else {
        die("Update Failed: " . mysqli_error($connection));
    }
}
?>
