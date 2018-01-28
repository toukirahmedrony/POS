<?php include 'includes/header.php'; ?>

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
    <br>
    <br>
    <br>
    <br>
    <!-- <?php
      if (isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
        echo $order_id;


      }

     ?> -->
    <div class="row">
      <div class="offset-md-1 col-md-4 offset-sm-1 col-sm-4 offset-3 col-6">
        <a href="email_check.php?order_id=<?php echo $order_id?>" class="btn btn-success already_user">Already a user</a>
      </div>
      <div class="offset-md-1 col-md-4 offset-sm-1 col-sm-4 offset-3 col-6">
        <a href="registration.php" class="btn btn-warning new_user">New to Here</a>
      </div>


    </div>



  </div>

</div>






































<?php include 'includes/footer.php'; ?>
