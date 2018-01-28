<?php
include 'includes/db.php';
  $customer_info_query ="SELECT * FROM users ORDER BY id DESC";
  $customer_info_run = mysqli_query($connection,$customer_info_query);
  if (mysqli_num_rows($customer_info_run) > 0 ) {


 ?>
<table class="table" id="ajax_output_table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Customer Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Country</th>
      <th scope="col">Adress</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($customer_info_row = mysqli_fetch_array($customer_info_run)) {
      $customer_name = $customer_info_row['name'];
      $customer_email = $customer_info_row['email'];
      $customer_phone = $customer_info_row['phone'];
      $customer_country = $customer_info_row['country'];
      $customer_adress= $customer_info_row['adress'];


     ?>

    <tr >
      <td> <?php echo "$customer_name" ?></td>
      <td><?php echo "$customer_email" ?></td>
      <td><?php echo "$customer_phone" ?></td>
      <td><?php echo "$customer_country" ?></td>
      <td><?php echo "$customer_adress" ?></td>


      <td><a href="" style="color:orange;"><i class="fa fa-pencil" aria-hidden="true"></i></a> </td>
      <td><a href="" style="color:red"><i class="fa fa-times" aria-hidden="true"></i></a> </td>
    </tr>
  <?php } ?>


  </tbody>
</table>
<?php }else {
echo "No Customer Yet";
} ?>
