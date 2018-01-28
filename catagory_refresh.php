<?php
include 'includes/db.php';



  $customer_info_query = "SELECT * FROM users ORDER BY id DESC";
  $customer_info_run =mysqli_query($connection,$customer_info_query);
  ?>
   <option value="">Select Email</option>
  <?php
  while ($customer_info_row = mysqli_fetch_array($customer_info_run)) {
    $customer= $customer_info_row['email'];
 ?>

<option value="<?php echo "$customer"; ?>"><?php echo "$customer"; ?> </option>

<?php } ?>


 ?>
