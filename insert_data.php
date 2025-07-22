<?php
include('db.php');

if (isset($_POST['add_students'])) {
    $fname = trim($_POST['first_name']);
    $lname = trim($_POST['last_name']);
    $age = trim($_POST['age']);

    // Validate fields
    if (empty($fname) || empty($lname) || empty($age)) {
        header("Location: page.php?error=Please+fill+all+fields&openModal=true");
        exit();
    }

    // Insert query
    $query = "INSERT INTO students (first_name, last_name, age) VALUES ('$fname', '$lname', '$age')";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        header("Location: page.php?success=Student+added+successfully");
        exit();
    }
}
?>
