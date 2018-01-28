<?php include 'includes/header.php'; ?>

<?php include 'includes/nav.php';
// ক্যাটাগরি অনুযায়ি সার্চের লজিক
if (isset($_GET['cat'])) {
  $cat_fetch_id = $_GET['cat'];
  $cat_fetch_query = "SELECT * FROM `catagory` WHERE `id` = $cat_fetch_id ";
  $cat_run = mysqli_query($connection,$cat_fetch_query);
  $cat_row = mysqli_fetch_array($cat_run);
  $cat_name = $cat_row['catagory'];

}

 ?>
<div class="row">
  <div class="col-md-3">
    <?php include 'includes/sidemanu.php'; ?>
  </div>

  <div class="col-md-9">
    <br>
    <button class="btn btn-secondary"type="button" disabled>All Products</button>
    <br>
    <hr>
    <div class="row">
      <div class="offset-md-1 col-md-10 offset-1 col-10">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Catagory
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php
             $catagory_value_fetch_query = "SELECT * FROM catagory ORDER BY id DESC";
             $catagory_value_fetch_run = mysqli_query($connection,$catagory_value_fetch_query);
             if (mysqli_num_rows($catagory_value_fetch_run) > 0) {
               while ($catagory_row = mysqli_fetch_array($catagory_value_fetch_run)) {
                 $catagory_option_name = $catagory_row['catagory'];
                 $catagory_option_id = $catagory_row['id'];
                 echo "<a class='dropdown-item' href='edit_products.php?cat=$catagory_option_id'>$catagory_option_name</a>";
               }}else {
               echo " <a class='dropdown-item' href='#'>null catagory </a>";
               }
             ?>
          </div>
        </div>
        <!-- .................. -->
        <?php if (isset($_GET['edit'])) {
            $product_edit_id = $_GET['edit'];
            $product_edit_data_fetch_query = "SELECT * FROM product WHERE id =$product_edit_id ";
            $product_edit_data_fetch_run =mysqli_query($connection,$product_edit_data_fetch_query);
            if (mysqli_num_rows($product_edit_data_fetch_run) > 0) {
              $product_edit_data_row = mysqli_fetch_array($product_edit_data_fetch_run);
              $product_prev_name = $product_edit_data_row['product_name'];
              $product_prev_catagory = $product_edit_data_row['catagory'];
              $product_prev_desc = $product_edit_data_row['description'];
              $product_prev_price = $product_edit_data_row['price'];


              if (isset($_POST['product_update'])) {
                $updated_product_name = mysqli_real_escape_string($connection,$_POST['product_name']);
                $updated_product_catagory = $_POST['catagory_name'];
                $updated_product_desc = mysqli_real_escape_string($connection,$_POST['product_desc']);
                $updated_product_price = mysqli_real_escape_string($connection,$_POST['product_price']);
                $update_product_query = "UPDATE `product` SET `product_name`='$updated_product_name',`catagory`='$updated_product_catagory',`price`=$product_prev_price,`description`='$product_prev_desc' WHERE id =$product_edit_id ";
                if (mysqli_query($connection,$update_product_query)) {
                  echo "<div class='alert alert-success' role='alert'>
                          Product has been updated
                          </div>";
                          header("Refresh:1; url=edit_products.php");
                }
              }

         ?>
        <div class="row">

          <div class="offset-md-1 col-md-7 offset-sm-1 col-sm-7 offset-1 col-7 ">
            <div class="form">
              <div class="row">
                <div class="offset-md-1 col-md-7 offset-sm-1 col-sm-7 offset-1 col-7">
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="Product Name">Product Name</label>
                      <input type="text" name="product_name" class="form-control" id="product_name" value="<?php echo "$product_prev_name" ?> " required>
                    </div>
                    <div class="form-group">
                      <label for="Catagory"><?php echo "$catagory_name"; ?></label>
                      <select class="form-control" name="catagory_name" id="catagory">
                        <?php
                          $query = "SELECT * FROM catagory ORDER BY id DESC";
                          $run = mysqli_query($connection,$query);
                          if (mysqli_num_rows($run)) {
                            while ($row = mysqli_fetch_array($run)) {
                              $catagory_name=$row['catagory']
                         ?>
                        <option value="<?php echo "$catagory_name" ?> "><?php echo "$catagory_name"; ?> </option>
                      <?php } } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="Product Description">Product Description</label>
                      <textarea class="form-control" id="product_des" rows="3" name="product_desc" required><?php echo "$product_prev_desc"; ?> </textarea>
                    </div>
                    <div class="form-group">
                      <label for="Product price">Product Base Price</label>
                      <input type="text" name="product_price" class="form-control" id="product_price" value="<?php echo $product_prev_price ?>"required>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary" name="product_update" class="form-control" value="Add Product">
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php }} ?>
        <br>
        <?php if (isset($_GET['del'])) {
          $product_del_id = $_GET['del'];
          $product_delete_query = "DELETE FROM product WHERE id = $product_del_id ";
          if (mysqli_query($connection,$product_delete_query)) {
            echo "<div class='alert alert-success' role='alert'>
                    Product has been deleted
                    </div>";
                    header("Refresh:1; url=edit_products.php");
          }

        } ?>
        <!-- ...................... -->
        <?php
          $product_view_query = "SELECT * FROM product ORDER BY id DESC";
          if (isset($cat_name)) {
            $product_view_query ="SELECT *FROM product WHERE catagory = '$cat_name' ";

          }
          $product_view_run = mysqli_query($connection,$product_view_query);
          if (mysqli_num_rows($product_view_run) > 0) {



         ?>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Sl no</th>
              <th scope="col">Product Name</th>
              <th scope="col">Catagory</th>
              <th scope="col">Price</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($product_view_row = mysqli_fetch_array($product_view_run)) {
              $product_sl = $product_view_row['id'];
              $product_name = $product_view_row['product_name'];
              $product_price = $product_view_row['price'];
              $product_catagory = $product_view_row['catagory'];


             ?>
            <tr>
              <th scope="row"><?php echo $product_sl; ?></th>
              <td><?php echo "$product_name"; ?> </td>
              <td><?php echo "$product_catagory"; ?> </td>
              <td><?php echo "$product_price"; ?> </td>
              <td><a href="edit_products.php?edit=<?php echo $product_sl; ?>" style="color:orange;"><i class="fa fa-pencil" aria-hidden="true"></i></a> </td>
              <td><a href="edit_products.php?del=<?php echo $product_sl; ?>" style="color:red"><i class="fa fa-times" aria-hidden="true"></i></a> </td>
            </tr>
          <?php } ?>

          </tbody>
        </table>
        <?php
      }else {
        echo "No product Yet";
      }
         ?>

      </div>


    </div>


  </div>

</div>






































<?php include 'includes/footer.php'; ?>
