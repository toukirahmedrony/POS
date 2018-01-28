<?php
include 'includes/db.php';

if (isset($_POST['update_email'])) {
  $customer_email = $_POST['update_email'];
  $customer_email_query = "SELECT * FROM users WHERE email ='$customer_email' ";
  $customer_email_run = mysqli_query($connection,$customer_email_query);
  $customer_email_row = mysqli_fetch_array($customer_email_run);
$customer_name = $customer_email_row['name'];

 ?>

<option value="<?php echo "$customer_name"?> " ><?php echo "$customer_name"?> </option >

 <?php } ?>


 <?php

 if (isset($_POST['update_catagory'])) {
   $product_catagory = $_POST['update_catagory'];
   $product_catagory_query = "SELECT * FROM product WHERE catagory ='$product_catagory' ";
   $product_catagory_run = mysqli_query($connection,$product_catagory_query);
   ?>
   <option value="">Please Select One</option>
   <?php
   while ($product_catagory_row = mysqli_fetch_array($product_catagory_run)) {
     $product_name = $product_catagory_row['product_name'];
?>

    <option value="<?php echo "$product_name"?> " ><?php echo "$product_name"?> </option >

<?php
   }
 }
  ?>


  <?php
  if (isset($_POST['update_product_name'])) {
    $product_name = $_POST['update_product_name'];
    $product_name_query = "SELECT * FROM product WHERE product_name = '$product_name' ";
    $product_name_run = mysqli_query($connection,$product_name_query);
    $product_name_row = mysqli_fetch_array($product_name_run);
    $product_price =$product_name_row['price'];
    ?>
    <option value="<?php echo "$product_price"?> " ><?php echo "$product_price"?> </option >
    <?php
  }

   ?>





<?php
if (isset($_POST['update_renewal'])) {
  $renewal_option = $_POST['update_renewal'];
  $currentDate = date("Y-m-d");
  $currentDateBin = strtotime($currentDate);
  if ($renewal_option == 'Monthly') {
    $new_date = strtotime('+ 1 month', $currentDateBin);
  }elseif ($renewal_option == 'Yearly') {
    $new_date = strtotime('+ 1 year', $currentDateBin);
  }
  $renewal_date =(date('Y-m-d', $new_date)) ;
  ?>
  <option value="<?php echo "$renewal_date"?> " ><?php echo "$renewal_date"?> </option >

  <?php
}


 ?>
