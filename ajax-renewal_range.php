<?php
include 'includes/db.php';


if (isset($_POST['update_renewal_range'])) {
  $renewal_range = $_POST['update_renewal_range'];
  $query = "SELECT * FROM sell" ;
  if ($renewal_range == 'Today') {
    $currentDate = date("Y-m-d");
    $query = "SELECT * FROM sell WHERE expiry_date = '$currentDate' ";
    $run = mysqli_query($connection,$query);
  }elseif ($renewal_range == 'Tomorrow') {
    $currentDate = date("Y-m-d");
    $tomorrowDate = date('Y-m-d', strtotime('+1 day'));

    $query = "SELECT * FROM sell WHERE expiry_date = '$tomorrowDate' ";
    $run = mysqli_query($connection,$query);

  }
  elseif ($renewal_range == 'This Month') {
    $currentDate = date('Y-m-d');
    $next_month = date('Y-m-d', strtotime('+1 month'));
    $query = "SELECT * FROM sell WHERE expiry_date BETWEEN '$currentDate' AND '$next_month' ";
    $run = mysqli_query($connection,$query);

  } elseif ($renewal_range == 'This Year') {
      $currentDate = date('Y-m-d');
      $next_year = date('Y-m-d', strtotime('+365 days'));

      $query = "SELECT * FROM sell WHERE expiry_date BETWEEN '$currentDate' AND '$next_year' ";
      $run = mysqli_query($connection,$query);
    }

    if (mysqli_num_rows($run) > 0) {
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
        <tbody><?php
        while ($today_renewal_row = mysqli_fetch_array($run)) {
          $product_name = $today_renewal_row['product_name'];
          $product_catagory= $today_renewal_row['product_catagory'];
          $product_price = $today_renewal_row['product_price'];
          $customer_name = $today_renewal_row['customer_name'];
          $renewal_option = $today_renewal_row['renewal option'];
          $renewal_date = $today_renewal_row['expiry_date'];
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
      <?php
    }else {
      echo " <h5 style ='text-align:center;'>No renewal availble </h5> ";
    }?>

    <?php

}?>
