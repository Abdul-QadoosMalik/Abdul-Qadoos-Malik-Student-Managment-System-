<?php
include('db.php'); // connect to your DB

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM students WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Redirect to main page with a success message
        header("Location: page.php?success=Student+deleted+successfully");
        exit();
    } else {
        // Show error if delete failed
        die("Delete Failed: " . mysqli_error($connection));
    }
} else {
    // If no ID was passed
    header("Location: page.php?error=Invalid+Student+ID");
    exit();
}
?>
