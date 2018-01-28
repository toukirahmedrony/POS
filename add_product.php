<?php include 'includes/header.php'; ?>

<?php include 'includes/nav.php'; ?>
<div class="row">
  <div class="col-md-3">
    <?php include 'includes/sidemanu.php'; ?>
  </div>

  <div class="col-md-9">
    <br>
    <button class="btn btn-secondary"type="button" disabled>Add Product</button>
    <br>
    <hr>
    <?php
      if (isset($_POST['product_submit'])) {
        $product_name = mysqli_real_escape_string($connection,$_POST['product_name']);
        $catagory_name = mysqli_real_escape_string($connection,$_POST['catagory_name']);
        $product_desc = mysqli_real_escape_string($connection,$_POST['product_desc']);
        $product_price = mysqli_real_escape_string($connection,$_POST['product_price']);
        $product_entry_query = "INSERT INTO `product`( `product_name`, `catagory`, `price`, `description`) VALUES ('$product_name','$catagory_name',$product_price,'$product_desc')";
        if (mysqli_query($connection,$product_entry_query)) {
          echo "<div class='alert alert-success' role='alert'>
                  Product has beenAdded
                  </div>";
                  header("Refresh:0; url=add_product.php");
        }else {
          echo (mysqli_error($connection));

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
                  <input type="text" name="product_name" class="form-control" id="product_name" placeholder="ex: Laptop" required>
                </div>
                <div class="form-group">
                  <label for="Catagory">Catagory</label>
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
                  <textarea class="form-control" id="product_des" rows="3" name="product_desc" required> </textarea>
                </div>
                <div class="form-group">
                  <label for="Product price">Product Base Price</label>
                  <input type="text" name="product_price" class="form-control" id="product_price" placeholder="ex: 100$" required>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" name="product_submit" class="form-control" value="Add Product">
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>






































<?php include 'includes/footer.php'; ?>
