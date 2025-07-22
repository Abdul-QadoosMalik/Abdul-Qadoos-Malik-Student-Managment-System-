<?php include('header.php'); ?>
<?php include('db.php'); ?>

<div class="box1">
    <h2>ALL STUDENTS</h2>
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD STUDENTS</button>
</div>
        
<form action="search_page.php" method="GET" class="form-inline my-2">
    <input type="number" name="id" class="form-control mr-2" placeholder="Enter Student ID" required>
    <button type="submit" class="btn btn-info">Search</button>
</form>


<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM `students`";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query Failed: " . mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-success" >Update</a></td>
                    
                    <td>  <a href="delete_page1.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this student?');">Delete</a></td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>
<form action="insert_data.php" method="post">

<?php
// Show alert message if exists
if (isset($_GET['error'])) {
    echo "<div class='alert alert-danger'>" . $_GET['error'] . "</div>";
}
if (isset($_GET['success'])) {
    echo "<div class='alert alert-success'>" . $_GET['success'] . "</div>";
}
?>
<?php
if(isset($_GET['insert_msg']))
{
    echo "<h6>". $_GET['insert_msg']."</h6>";
}

?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header d-flex justify-content-between align-items-center">
        <h5 class="modal-title mb-0" id="exampleModalLabel">Add Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="insert.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="f_name">First Name</label>
            <input type="text" name="first_name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="l_name">Last Name</label>
            <input type="text" name="last_name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" class="form-control" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-success" name="add_students" value="ADD">
        </div>
      

    </div>
  </div>
</div>

</form>        

<?php include('footer.php'); ?>
...
</div> <!-- container end -->

<!-- Bootstrap JS + jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function () {
        <?php if (isset($_GET['openModal']) && $_GET['openModal'] == 'true'): ?>
            $('#exampleModal').modal('show');
        <?php endif; ?>
    });
</script>


</body>
</html>
