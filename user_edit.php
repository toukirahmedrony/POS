<?php include 'includes/header.php';

session_start();
?>

<?php include 'includes/nav.php'; ?>
<div class="row">
  <div class="col-md-3">
    <?php include 'includes/sidemanu.php'; ?>
  </div>

  <div class="col-md-9">
    <br>
    <button class="btn btn-secondary"type="button" disabled>Edit users</button>
    <br>
    <hr>

    <?php
    $edit_id = $_SESSION['original_id'] ;
    $prev_user_fetch_query = "SELECT * FROM users WHERE id = $edit_id";
    $prev_user_fetch_run = mysqli_query($connection,$prev_user_fetch_query);
    if (mysqli_num_rows($prev_user_fetch_run) > 0) {
    $prev_user_row= mysqli_fetch_array($prev_user_fetch_run);
    $prev_name = $prev_user_row['name'];
    $prev_email = $prev_user_row['email'];
    $prev_password = $prev_user_row['password'];
  }

    // ভেল্যু আপডেট লজিক
    if (isset($_POST['reg_update'])) {
      $updated_name = $_POST['name'];
      $updated_email = $_POST['email'];
      $updated_password = $_POST['password'];
      $updated_confirm_password = $_POST['confirm_password'];
      if ($updated_password == $updated_confirm_password) {
        $user_update_query = "UPDATE `users` SET
        `name`='$updated_name',`email`='$updated_email',`password`='$updated_password' WHERE id =$edit_id ";
        if (mysqli_query($connection,$user_update_query)) {
          echo "<div class='alert alert-success' role='alert'>
                  User has been updated
                  </div>";
                  header("Refresh:1; url=users.php");
        }
      }
    }


     ?>
    <div class="row">
      <div class="offset-md-2 col-md-6 offset-sm-2 col-sm-6 offset-2 col-8 email_check">
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="<?php echo "$prev_name" ?>" required>
          </div>
          <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="<?php echo "$prev_email" ?>" required>
          </div>
          <div class="form-group">
            <label for="Product Name">Password</label>
            <input type="text" name="password" class="form-control" id="email" value="<?php echo "$prev_password" ?>" required>
          </div>
          <div class="form-group">
            <label for="Product Name">Confirm Password</label>
            <input type="text" name="confirm_password" class="form-control" id="email" placeholder="Confirm Password" required>
          </div>
          <div class="form-group">

            <input type="submit" class="btn btn-primary" name="reg_update" class="form-control" value="Update">
          </div>

        </form>


      </div>
    </div>



  </div>




</div>






































<?php include 'includes/footer.php'; ?>
