<?php
  include 'includes/db.php';
      $date = date("d-m-Y");
      $instance_user_name = $_POST['ajax_reg_name'];
      $instance_user_emai = $_POST['ajax_reg_email'];
      $instance_user_phone = $_POST['ajax_reg_phone'];
      $instance_user_adress = $_POST['ajax_reg_adress'];
      $instance_user_country = $_POST['ajax_reg_country'];
      $instance_user_entry_query = "INSERT INTO `users`(`date`, `name`, `email`, `phone`, `adress`, `country`)
      VALUE ('$date','$instance_user_name','$instance_user_emai','$instance_user_phone','$instance_user_adress','$instance_user_country')";
     if (mysqli_query($connection,$instance_user_entry_query)) { 

      $table ='';
        $customer_info_query ="SELECT * FROM users ORDER BY id DESC";
        $customer_info_run = mysqli_query($connection,$customer_info_query);
        while ($customer_info_row =mysqli_fetch_array($customer_info_run)) {
            $customer_id = $customer_info_row ['id'];
            $customer_name = $customer_info_row['name'];
            $customer_email = $customer_info_row['email'];
            $customer_phone = $customer_info_row['phone'];
            $customer_country = $customer_info_row['country'];
            $customer_adress= $customer_info_row['adress'];
          
 
        $table .=' 
             <tr >
               <td>customer_name</td>
               <td>customer_email</td>
               <td>customer_phone</td>
               <td>customer_country</td>
               <td>customer_adress</td> 
              </tr> ';







}
echo "table";


}     
      ?>

