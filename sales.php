<?php include 'includes/header.php';




if (isset($_GET['cat'])) {
  $cat_fetch_id = $_GET['cat'];
  $cat_fetch_query = "SELECT * FROM `catagory` WHERE `id` = $cat_fetch_id ";
  $cat_run = mysqli_query($connection,$cat_fetch_query);
  $cat_row = mysqli_fetch_array($cat_run);
  $cat_name = $cat_row['catagory'];

}

 ?>

<?php include 'includes/nav.php'; ?>
<div class="row">
  <div class="col-md-3">
    <?php include 'includes/sidemanu.php'; ?>
  </div>

  <div class="col-md-9">
    <br>

    <div class="row">
      <div class="col-md-3">
        <a href="addsell.php" class="btn btn-success btn-block"> Add New Sell </a>
        <br>

      </div>
      <div class="col-md-3">
        <button class="btn btn-secondary btn-block"type="button" disabled>Sold Product</button>

      </div>

    </div>

    <br>
    <hr>
    <div class="row">
      <div class="offset-md-1 col-md-10 offset-1 col-10">
        <h3 style="text-align:center;font-weight: bold;">Sold Products</h3>
        <!-- <p style="text-align:center; font-weight:bold">Sold Products</p> -->
        <hr>
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
                 echo "<a class='dropdown-item' href='sales.php?cat=$catagory_option_id'>$catagory_option_name</a>";
               }}else {
               echo " <a class='dropdown-item' href='#'>null catagory </a>";
               }
             ?>
          </div>
        </div>

        <hr>

        <?php
          $sells_fetch_query = "SELECT * FROM sell ORDER BY id DESC";
          if (isset($cat_name)) {
            $sells_fetch_query ="SELECT *FROM sell WHERE product_catagory = '$cat_name' ORDER BY id DESC";

          }
          $sells_fetch_run = mysqli_query($connection,$sells_fetch_query);
          if (mysqli_num_rows($sells_fetch_run) > 0) {



         ?>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Product Name</th>
              <th scope="col">Catagory</th>
              <th scope="col">Price</th>
              <th scope="col">Buyer</th>
              <th scope="col">Renewal</th>
              <th scope="col">Renewal Date</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($sells_fetch_row = mysqli_fetch_array($sells_fetch_run)) {
              $product_name = $sells_fetch_row['product_name'];
              $product_catagory= $sells_fetch_row['product_catagory'];
              $product_price = $sells_fetch_row['product_price'];
              $customer_name = $sells_fetch_row['customer_name'];
              $renewal_option = $sells_fetch_row['renewal option'];
              $renewal_date = $sells_fetch_row['expiry_date'];


             ?>
            <tr>

              <td ><?php echo "$product_name"; ?> </td>
              <td ><?php echo "$product_catagory"; ?> </td>
              <td ><?php echo "$product_price"; ?> </td>
              <td ><?php echo "$customer_name"; ?> </td>
              <td ><?php echo "$renewal_option"; ?> </td>
              <td ><?php echo "$renewal_date"; ?> </td>

            </tr>
          <?php } ?>

          </tbody>
        </table>
      <?php }else {
        echo "<h5 style='text-align:center'>No product has been sold yet</h5>";
      } ?>

      </div>


    </div>


  </div>

</div>






































<?php include 'includes/footer.php'; ?>
