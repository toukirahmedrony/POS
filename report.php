<?php include 'includes/header.php'; ?>

<?php include 'includes/nav.php'; ?>
<div class="row">
  <div class="col-md-3">
    <?php include 'includes/sidemanu.php'; ?>
  </div>

  <div class="col-md-9">
    <br>
    <button class="btn btn-secondary"type="button" disabled>Reports</button>
    <br>
    <hr>
    <div class="row">
      <div class="offset-md-2 col-md-6 offset-sm-2 col-sm-6 offset-2 col-8 renewal_option_select">
          <div class="form-group" style="text-align: center;">
            <h5 style="font-weight: bold;">Renewal Report</h5>
            <select class="form-control" id="ajax_renewal_range" >
              <option>Please Select a range</option>
              <option>Today</option>
              <option>Tomorrow</option>
              <option>This Month </option>
              <option>This Year </option>
            </select>
          </div>


      </div>

    </div>
   <?php
          $sells_fetch_query = "SELECT * FROM sell ORDER BY id DESC";
          if (isset($cat_name)) {
            $sells_fetch_query ="SELECT *FROM sell WHERE product_catagory = '$cat_name' ORDER BY id DESC";

          }
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




<script type="text/javascript">
$(document).ready(function(){
$("#ajax_renewal_range").change(function (){
  var renewal_range = $(this).val(); // একটা ভেরিয়েবল যেটাতে ভেলু পাস হবে
  $.post(
    "ajax-renewal_range.php",
    {update_renewal_range : renewal_range},//যেটা এজাক্স পেজে যাবে
    function(data){
      $("#ajax_renewal_table").html(data);//আউটপুট ডিভ
    }
  )
});
});

</script>





































<?php include 'includes/footer.php'; ?>
