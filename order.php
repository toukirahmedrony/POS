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
    <div class="row">
      <div class="offset-md-2 col-md-6 offset-sm-2 col-sm-6 offset-2 col-8 email_check">
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="Product catagory">Customer Name</label>
            <input type="text" name="product_catagory" class="form-control" id="catagory" placeholder="" >
          </div>
          <div class="form-group">
            <label for="Product catagory">Product Catagory</label>
            <input type="text" name="product_catagory" class="form-control" id="catagory" placeholder="" >
          </div>
          <div class="form-group">
            <label for="Product Name">Product Name</label>
            <input type="text" name="Password" class="form-control" id="product_name" placeholder="" >
          </div>
          <div class="form-group">
            <label for="Product Price">Product Price</label>
            <input type="text" name="confirm_password" class="form-control" id="email" placeholder="" >
          </div>
          <div class="form-group">
            <label for="Renewal">Renewal Option</label>
            <select class="form-control" name="renewal" id="catagory" required>
              <option>Monthly</option>
              <option>Yearly</option>
            </select>
          </div>
          <div class="form-group">
            <label for="Product Price">Order Date</label>
            <input type="text" name="confirm_password" class="form-control" id="email" placeholder="" >
          </div>
          <div class="form-group">
            <label for="Product Price">Renewal Date</label>
            <input type="text" name="confirm_password" class="form-control" id="email" placeholder="" >
          </div>


          <div class="form-group">

            <input type="submit" class="btn btn-primary"name="order_submit" class="form-control" value="Order">
          </div>

        </form>


      </div>

    </div>
    <br>
    <br>





  </div>

</div>






































<?php include 'includes/footer.php'; ?>
