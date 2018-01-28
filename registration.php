<?php include 'includes/header.php'; ?>

<?php include 'includes/nav.php'; ?>
<div class="row">
  <div class="col-md-3">
    <?php include 'includes/sidemanu.php'; ?>
  </div>

  <div class="col-md-9">
    <br>
    <button class="btn btn-secondary"type="button" disabled>Registration</button>
    <br>

    <hr>
    <?php
      if (isset($_POST['reg_submit'])) {
        $date= time();
        $name = mysqli_real_escape_string($connection,ucfirst($_POST['name']));
        $email = mysqli_real_escape_string($connection,$_POST['email']);
        $password = mysqli_real_escape_string($connection,$_POST['Password']);
        $confirm_password = mysqli_real_escape_string($connection,$_POST['confirm_password']);
        if ($password == $confirm_password) {
          // চেক যে অলরেডি ইমেইল রেজিস্টার্ড কিনা
          $reg_check_query = "SELECT * FROM users WHERE email ='$email' ";
          $reg_check_run=mysqli_query($connection,$reg_check_query);
          if (mysqli_num_rows($reg_check_run) > 0) {
            echo "<div class='alert alert-danger' role='alert'>
                    Email is already used
                    </div>";
                    header("Refresh:1; url=registration.php");
          }else {
            $registration_query = "INSERT INTO `users`(`date`, `name`, `email`, `password`)VALUES ('$date','$name','$email','$password')";
            if (mysqli_query($connection,$registration_query)) {
              echo "<div class='alert alert-success' role='alert'>
                      Registration completed
                      </div>";
                      header("Refresh:1; url=users.php");
            }

          }


        }
      }

     ?>
    <div class="row">
      <div class="offset-md-2 col-md-6 offset-sm-2 col-sm-6 offset-2 col-8 email_check">
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter your Name" required>
          </div>
          <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
          </div>
          <div class="form-group">
            <label for="Product Name">Password</label>
            <input type="text" name="Password" class="form-control" id="email" placeholder="Enter Password" required>
          </div>
          <div class="form-group">
            <label for="Product Name">Confirm Password</label>
            <input type="text" name="confirm_password" class="form-control" id="email" placeholder="Confirm Password" required>
          </div>
          <div class="form-group">

            <input type="submit" class="btn btn-primary" name="reg_submit" class="form-control" value="Registration">
          </div>

        </form>


      </div>

    </div>
    <br>
    <br>





  </div>

</div>






































<?php include 'includes/footer.php'; ?>
