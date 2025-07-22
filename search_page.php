<?php include('header.php'); ?>
<?php include('db.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM students WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        ?>

        <h2>Student Record</h2>
        <table class="table table-bordered table-striped">
            <tr><th>ID</th><td><?php echo $row['id']; ?></td></tr>
            <tr><th>First Name</th><td><?php echo $row['first_name']; ?></td></tr>
            <tr><th>Last Name</th><td><?php echo $row['last_name']; ?></td></tr>
            <tr><th>Age</th><td><?php echo $row['age']; ?></td></tr>
        </table>

        <a href="page.php" class="btn btn-secondary">Back</a>

        <?php
    } else {
        echo "<h5>No student found with ID: $id</h5>";
        echo '<a href="page.php" class="btn btn-secondary">Back</a>';
    }
} else {
    echo "<h5>Invalid request: No ID provided</h5>";
    echo '<a href="page.php" class="btn btn-secondary">Back</a>';
}
?>

<?php include('footer.php'); ?>
