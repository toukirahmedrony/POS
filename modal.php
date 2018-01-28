<?php
  include 'includes/db.php';
      $date = date("d-m-Y");
      $instance_user_name = $_POST['ajax_reg_name1'];
      $instance_user_email = $_POST['ajax_reg_email1'];
      $instance_user_phone = $_POST['ajax_reg_phone1'];
      $instance_user_adress = $_POST['ajax_reg_adress1'];
      $instance_user_country = $_POST['ajax_reg_country1'];
      $instance_user_entry_query = "INSERT INTO `users`(`date`, `name`, `email`, `phone`, `adress`, `country`)
      VALUE ('$date','$instance_user_name','$instance_user_email','$instance_user_phone','$instance_user_adress','$instance_user_country')";
      // $instance_user_entry_run = mysqli_query($connection,$instance_user_entry_query);
      $instance_user_entry_run= mysqli_query($connection,$instance_user_entry_query);
        
   ?>

