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
    <button class="btn btn-secondary"type="button" disabled>Usercheck</button>
    <br>

    <hr>
    <?php
    if (isset($_POST['chk_submit'])) {
      $check_email = $_POST['email'];
      // চেক ইমেইল
      $check_email_query = "SELECT * FROM users WHERE email ='$check_email' ";
      $check_email_run = mysqli_query($connection,$check_email_query);
      if (mysqli_num_rows($check_email_run) > 0) {
            header('Location:orderpage.php');
            $_SESSION['buyer_email'] = $check_email_run;
      }else {
        echo "<div class='alert alert-danger' role='alert'>
                Sorry Email isn't registerd
                </div>";
      }
    }

    ?>
    <div class="row">
      <div class="offset-md-2 col-md-6 offset-sm-2 col-sm-6 offset-2 col-8 email_check">
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="Product Name">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
          </div>
          <div class="form-group">

            <input type="submit" class="btn btn-primary"name="chk_submit" class="form-control" value="Check">
          </div>

        </form>

      </div>

    </div>





  </div>

</div>






































<?php include 'includes/footer.php'; ?>
