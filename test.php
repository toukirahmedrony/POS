<?php include 'includes/header.php'; ?>

<?php include 'includes/nav.php'; ?>
<div class="row">
  <div class="col-md-3">
    <?php include 'includes/sidemanu.php'; ?>
  </div>

  <div class="col-md-9">
    <button class="btn btn-secondary"type="button" disabled>Reports</button>

   <?php
          $currentDate = date('d-m-Y');
          $next_month = date('d-m-y', strtotime('+1 month'));
          $sells_fetch_query = "SELECT *FROM sell WHERE expiry_date BETWEEN '$currentDate' AND '$next_month '";
        //   if (isset($cat_name)) {
        //     $sells_fetch_query ="SELECT *FROM sell WHERE product_catagory = '$cat_name' ORDER BY id DESC";

        //   }
          $sells_fetch_run = mysqli_query($connection,$sells_fetch_query);
          if (mysqli_num_rows($sells_fetch_run) > 0) {



         ?>
        <table class="table" id="ajax_renewal_table">
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






<?php include 'includes/footer.php'; ?>