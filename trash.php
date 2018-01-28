$(document).ready(function(){
  // alert("HI");
  $("#ajax_customer_email").change(function(){
    var customer_email = $(this).val();
    $.post(
      "ajax.php",
      {selected_customer_email : customer_email},
      function(data){
        $("#ajax_customer_name").html(data);
      }
    )
  });
});



<!-- <?php
$customer_email = $_POST['selected_customer_email'];
$query = "SELECT * FROM users WHERE email = '$customer_email'";
$run = mysqli_query($connection,$run);
if (mysqli_num_rows($run) > 0) {
while ($row = mysqli_fetch_array($run)) {
 $customer_name = $row['name'];
}
 ?>
 <option value="<?php echo "$customer_name";?> "><?php echo "$customer_name";?></option>
<?php }}else {
?>
<option value="">No User</option>
<?php } ?> -->
