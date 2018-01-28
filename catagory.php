<?php include 'includes/header.php';?>


<?php include 'includes/nav.php';?>
<div class="row">
  <div class="col-md-3">
    <?php include 'includes/sidemanu.php'; ?>
  </div>

  <div class="col-md-9">
    <br>
    <button class="btn btn-secondary"type="button" disabled>Add Catagory</button>
    <br>
    <hr>
    <div class="row">
      <div class="offset-2 col-8 col-md-5 ">
        <!-- ক্যাটাগরি ডাটা নিচ্ছি -->
        <?php if (isset($_POST['cat_submit'])) {
            $catagory_name = ucfirst($_POST['cat_name']);
            // চেক ক্যাটাগরি নেইম
            $catagory_data_query = "SELECT *  FROM catagory WHERE catagory = '$catagory_name' ";
            $catagory_data_run = mysqli_query($connection,$catagory_data_query);
            if (mysqli_num_rows($catagory_data_run) > 0) {
              echo "<div class='alert alert-danger' role='alert'>
                      Catagory Already exist
                      </div>";
                      header("Refresh:0; url=catagory.php");
            } else {
            $catagory_entry_query = "INSERT INTO `catagory`(`catagory`) VALUES ('$catagory_name')";
              if (mysqli_query($connection, $catagory_entry_query)) {
                echo "<div class='alert alert-success' role='alert'>
                        Successfully Done
                        </div>";
                        header("Refresh:0; url=catagory.php");

              }
            }

        } ?>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="Product Name">Add Catagory</label>
            <input type="text" name="cat_name" class="form-control" id="cat_name" placeholder="ex: Domain">
          </div>
          <div class="form-group">

            <input type="submit" class="btn btn-primary" name="cat_submit" class="form-control" value="Add Catagory">
          </div>

        </form>

        <!-- এডিট কুয়েরি -->
        <?php if (isset($_GET['edit'])) {
          $catagory_edit_id = $_GET['edit'];
          $catagory_edit_id_data_fetch_query = "SELECT * FROM catagory WHERE id = $catagory_edit_id ";
          $catagory_edit_id_data_fetch_run = mysqli_query($connection,$catagory_edit_id_data_fetch_query);
          if (mysqli_num_rows($catagory_edit_id_data_fetch_run)) {

            $catagory_edit_id_data_row = mysqli_fetch_array($catagory_edit_id_data_fetch_run);
            $catagory_edit_id_data_fetched_id = $catagory_edit_id_data_row['id'];
            $catagory_edit_id_data_fetched_catagory = $catagory_edit_id_data_row['catagory'];

            if (isset($_POST['cat_update'])) {
              $catagory_updated_name = mysqli_real_escape_string($connection,$_POST['cat_updated_name']);
              $catagory_update_action_query = "UPDATE `catagory` SET `catagory`='$catagory_updated_name' WHERE id =$catagory_edit_id_data_fetched_id ";
              if (mysqli_query($connection,$catagory_update_action_query)) {
                echo "<div class='alert alert-success' role='alert'>
                        Successfully Updated
                        </div>";
                        header("Refresh:0; url=catagory.php");
              }
            }
         ?>


         <hr>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="Product Name">Edit Catagory</label>
            <input type="text" name="cat_updated_name" class="form-control" id="cat_name" value="<?php echo "$catagory_edit_id_data_fetched_catagory" ?> ">
          </div>
          <div class="form-group">

            <input type="submit" class="btn btn-primary" name="cat_update" class="form-control" value="Edit Catagory">
          </div>

        </form>
      <?php }} ?>

        <br>
        <hr>
        <?php if (isset($_GET['del'])) {
          $catagory_del_id= $_GET['del'];
          $catagory_del_data_query = "DELETE FROM catagory WHERE id = $catagory_del_id";
          if (mysqli_query($connection,$catagory_del_data_query)) {
            echo "<div class='alert alert-success' role='alert'>
                    Catagory Deleted
                    </div>";
                    header("Refresh:0; url=catagory.php");
          }
        } ?>
        <!-- ক্যাটাগরি এর ডাটা ফেচ -->
        <?php
          $catagory_fetch_query = "SELECT * FROM `catagory` ORDER BY id DESC";
          $catagory_fetch_run = mysqli_query($connection,$catagory_fetch_query);
          if (mysqli_num_rows($catagory_fetch_run) > 0) {
         ?>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Catagory Name</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>

            </tr>
          </thead>
          <tbody>
            <?php
              while ($catagory_row = mysqli_fetch_array($catagory_fetch_run)) {
                $catagory_name_data = $catagory_row['catagory'];
                $catagory_view_id = $catagory_row['id']
             ?>


            <tr>


              <td style="text-align:center"><?php echo "$catagory_name_data"; ?></td>
              <td style="text-align:center"><a href="catagory.php?edit=<?php echo $catagory_view_id; ?>" style="color:orange;"><i class="fa fa-pencil" aria-hidden="true"></i></a> </td>
              <td style="text-align:center"><a href="catagory.php?del=<?php echo $catagory_view_id; ?>" style="color:red"><i class="fa fa-times" aria-hidden="true"></i></a> </td>

            </tr>
          <?php } ?>
          </tbody>
        </table>
      <?php }else {
        echo "No catagory yet";
      } ?>

      </div>


    </div>


  </div>

</div>






































<?php include 'includes/footer.php'; ?>
