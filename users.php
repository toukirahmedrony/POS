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
    <button class="btn btn-secondary"type="button" disabled>Users</button>
    <br>
    <hr>
    <div class="row">
      <div class="offset-md-1 col-md-10 offset-1 col-10">

        <?php
        // ডিলিট কুয়েরি
        if (isset($_GET['del'])) {
          $delete_id =$_GET['del'];
          $to_del_prev_user_fetch = "SELECT * FROM users WHERE id =$delete_id";
          $to_del_prev_user_run = mysqli_query($connection,$to_del_prev_user_fetch);
          if (mysqli_num_rows($to_del_prev_user_run) > 0) {
            $to_del_prev_user_row = mysqli_fetch_array($to_del_prev_user_run);
            $del_prev_password =$to_del_prev_user_row['password'];
            $del_prev_id =$to_del_prev_user_row['id'];

          }
          if (isset($_POST['pass_check'])) {
            $check_password = $_POST['password'];


          if ("$del_prev_password" == "$check_password") {
              $delete_user_query ="DELETE FROM `users` WHERE id =$del_prev_id ";
              if (mysqli_query($connection,$delete_user_query)) {
                echo "<div class='alert alert-success' role='alert'>
                        User has been delted
                        </div>";
                        header("Refresh:1; url=users.php");

              }
          }else{
            echo "<div class='alert alert-danger' role='alert'>
                    Sorry passowrd didn't match with original
                    </div>";
          }
        }

          ?>

          <!-- ডিলিট করার আগে পাসওয়ার্ড চেক এর জন্য ফর্ম -->
          <div class="row check_pass">
            <div class="offset-md-2 col-md-6 offset-sm-2 col-sm-6 offset-2 col-8 email_check">
              <form class="" action="" method="post" enctype="multipart/form-data">
              <p>To delete we need to know if it is yours .. </p>

                <div class="form-group">
                  <label for="Product Name">Password</label>
                  <input type="text" name="password" class="form-control" id="email" placeholder="Enter Password" required>
                </div>

                <div class="form-group">

                  <input type="submit" class="btn btn-primary" name="pass_check" class="form-control" value="Delete">
                </div>

              </form>


            </div>

          </div>

        <?php } ?>

      <?php


      if (isset($_GET['edit'])) {
        $edit_id =$_GET['edit'];

          if (isset($_POST['pass_check'])) {
            $check_password= mysqli_real_escape_string($connection,$_POST['password']);
            $check_pass_query = "SELECT * FROM users WHERE id =$edit_id ";
            $check_pass_run = mysqli_query($connection,$check_pass_query);
            if (mysqli_num_rows($check_pass_run) > 0) {
              $check_pass_row = mysqli_fetch_array($check_pass_run);
              $original_id = $check_pass_row['id'];
              // $_POST['original_id'] = $original_id;
              $original_pass = $check_pass_row['password'];
              if ($original_pass == $check_password) {
                header('Location:user_edit.php');
              $_SESSION['original_id'] = $original_id;
                }else{
                  echo "<div class='alert alert-danger' role='alert'>
                          Sorry passowrd didn't match with original
                          </div>";
                }
              }
            }


      ?>
      <!-- ইউজার এডিট এর জন্য পাস চেক করার ফর্ম -->
      <div class="row check_pass">
        <div class="offset-md-2 col-md-6 offset-sm-2 col-sm-6 offset-2 col-8 email_check">
          <form class="" action="" method="post" enctype="multipart/form-data">
          <p>To edit we need to know if it is yours .. </p>

            <div class="form-group">
              <label for="Product Name">Password</label>
              <input type="text" name="password" class="form-control" id="email" placeholder="Enter Password" required>
            </div>

            <div class="form-group">

              <input type="submit" class="btn btn-primary" name="pass_check" class="form-control" value="Edit">
            </div>

          </form>


        </div>

      </div>
    <?php } ?>

        <!-- ................. -->
        <?php
          $user_data_query = "SELECT * FROM users ORDER BY id DESC";
          $user_data_run = mysqli_query($connection,$user_data_query);
          if (mysqli_num_rows($user_data_run) > 0) {
         ?>

        <table class="table">



          <thead class="thead-dark">
            <tr>
              <th scope="col"> Name</th>
              <th scope="col">Reg Date</th>
              <th scope="col">Email</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($user_data_row = mysqli_fetch_array($user_data_run)) {
              $user_id =$user_data_row['id'];
              $user_name = $user_data_row['name'];
              $date = getdate($user_data_row['date']);
              $day = $date['mday'];
              $month = $date['month'];
              $year = $date['year'];
              // $tarikh = '$month $day $year';
              // $somoi = (date('d/m/Y', strtotime($tarikh)));
              //
              // $somoi = strtotime($somoi);
              // $new_date = strtotime('+ 2 year', $somoi);
              // $xz = (date('d/m/Y', $new_date)) ;
              // // $datelocal = '$month $day $year';
              // // $tarikh =  date('d-m-Y', strtotime($datelocal));

              $user_email = $user_data_row['email'];
             ?>
            <tr>
              <td ><?php echo "$user_name"; ?> </td>
              <td><?php echo "$day $month $year"; ?> </td>
              <td><?php echo "$user_email $year"; ?></td>
              <td><a href="users.php?edit=<?php echo $user_id; ?>" style="color:orange;"><i class="fa fa-pencil" aria-hidden="true"></i></a> </td>
              <td><a href="users.php?del=<?php echo $user_id; ?>" style="color:red"><i class="fa fa-times" aria-hidden="true"></i></a> </td>

            </tr>
          <?php } ?>

          </tbody>

        </table>
      <?php }else {
        echo "No user yet";
      } ?>

      </div>


    </div>


  </div>

</div>






































<?php include 'includes/footer.php'; ?>
