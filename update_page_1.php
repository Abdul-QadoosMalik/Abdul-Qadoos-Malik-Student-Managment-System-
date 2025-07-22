<?php include('header.php'); ?>
<?php include('db.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM `students` WHERE id = '$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}
?>

<div class="container mt-4">
    <h2>Update Student</h2>
    <form action="update_data.php" method="POST">
        <!-- Hidden field to send ID -->
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <div class="form-group">
            <label for="f_name">First Name</label>
            <input type="text" name="first_name" class="form-control" value="<?php echo $row['first_name']; ?>" required>
        </div>

        <div class="form-group">
            <label for="l_name">Last Name</label>
            <input type="text" name="last_name" class="form-control" value="<?php echo $row['last_name']; ?>" required>
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" class="form-control" value="<?php echo $row['age']; ?>" required>
        </div>

        <button type="submit" name="update_student" class="btn btn-success">Update</button>
    </form>
</div>

<?php include('footer.php'); ?>
