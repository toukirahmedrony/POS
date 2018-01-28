<?php include 'includes/header.php';
session_start();
 ?>

<?php include 'includes/nav.php'; ?>
<div class="row">
  <div class="col-md-3">
    <?php include 'includes/sidemanu.php'; ?>
  </div>

  <div class="col-md-9">
    <br>
    <button class="btn btn-secondary"type="button" disabled>Order</button>
    <br>

    <hr>

    <div class="row">
      <div class="offset-md-2 col-md-6 offset-sm-2 col-sm-6 offset-2 col-8 email_check">
        <?php
          $order_id = $_SESSION['order_id'];
          echo "$order_id";
         ?>
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter your Name" style="visibility:hidden;">
            <input type="text" name="" class="form-control" id="name" placeholder="Enter your Name" disabled>
          </div>
          <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter your Name" required>
          </div>
          <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter your Name" required>
          </div>
          <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
          </div>
          <div class="form-group">
            <label for="Product Name">Password</label>
            <input type="text" name="Password" class="form-control" id="email" placeholder="Enter Password" required>
          </div>
          <div class="form-group">
            <label for="Product Name">Confirm Password</label>
            <input type="text" name="confirm_password" class="form-control" id="email" placeholder="Confirm Password" required>
          </div>
          <div class="form-group">

            <input type="submit" class="btn btn-primary" name="reg_submit" class="form-control" value="Registration">
          </div>

        </form>


      </div>

    </div>
    <br>
    <br>





  </div>

</div>






































<?php include 'includes/footer.php'; ?>
