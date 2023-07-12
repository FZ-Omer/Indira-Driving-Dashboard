<?php 
include("../../connect.php");
$sql = "SELECT * FROM enrollment";
$result = $conn->query($sql);
?>

<?php
include("admin-header.php");
?>


<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-8 mx-auto mt-5">
          <div class="card shadow-sm">
            <div class="card-header bg-danger text-white">
              <h1 class="mb-0">Payment</h1>
            </div>
            <div class="card-body table-responsive">
              <table id="myTable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Enrollment Id</th>
                    <th>Name</th>
                    <th>Mobile No</th>
                    <th>Classes Name</th>
                    <th>No Of Days</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      ?>
                      <tr>
                        <td><?php echo $row['enr_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['pmobile']; ?></td>
                        <td><?php echo $row['class_name']; ?></td>
                        <td><?php echo $row['nfd']; ?></td>

                        <td>
                          <a class="btn btn-info" href="employee-edit.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;
                          <a class="btn btn-danger" href="employee-delete.php?id=<?php echo $row['id']; ?>" onclick="confirmDelete(event)">Delete</a>
                        </td>
                      </tr>
                  <?php
                    }
                  } else {
                    echo "<tr><td colspan='6'>No staff members found</td></tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <div class="card-footer text-center">
              <a href="Payment.php"><button class="btn btn-danger">+ Add Payment</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
include("admin-footer.php");
?>
