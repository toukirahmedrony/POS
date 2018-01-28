<?php include 'includes/header.php'; ?>

<?php include 'includes/nav.php'; ?>
<div class="row">
  <div class="col-md-3">
    <?php include 'includes/sidemanu.php'; ?>
  </div>

  <div class="col-md-9">
    <br>
    <br>
    <div class="row">
      <?php
          $product_fetch = "SELECT * FROM product ";
          $product_run = mysqli_query($connection,$product_fetch);
          $product_count= mysqli_num_rows($product_run);

       ?>
      <div class="col-sm-6 col-md-4">
        <div class="card" style="width: 18rem;background:#F64747;">
          <div class="card-body">
            <div class="row">
              <div class="col-xs-3 card_icon">
                <i class="fa fa-cubes fa-5x"></i>
              </div>
              <div class="col-xs-9 card_text">
                <h1 class="text-center"><?php echo $product_count; ?> </h1>
                <h5 class="text-right right_comment">Products</h5>
              </div>
            </div>
          </div>
          <br>
          <div class="card-header ">
            <a href="products.php">All Products  <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>

      <?php
        $catagory_fetch = "SELECT * FROM catagory";
        $catagory_run = mysqli_query($connection,$catagory_fetch);
        $catagory_count = mysqli_num_rows($catagory_run);

       ?>
      <div class="col-sm-6 col-md-4">
        <div class="card" style="width: 18rem;background:#65C6BB;">
          <div class="card-body">
            <div class="row">
              <div class="col-xs-3 card_icon">
                <i class="fa fa-files-o fa-5x"></i>
              </div>
              <div class="col-xs-9 card_text">
                <h1 class="text-center"><?php echo $catagory_count; ?> </h1>
                <h5 class="text-right right_comment">Catagories</h5>
              </div>
            </div>
          </div>
          <br>
          <div class="card-header ">
            <a href="catagory.php">All Catagory   <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
      <?php
          $currentDate = date('d-m-Y');
          $sell_fetch = "SELECT * FROM sell WHERE buy_date = '$currentDate' ";
          $sell_run = mysqli_query($connection,$sell_fetch);
          $sell_count =mysqli_num_rows($sell_run);

       ?>
      <div class="col-sm-6 col-md-4">
        <div class="card" style="width: 18rem;background:#36D7B7;">
          <div class="card-body">
            <div class="row">
              <div class="col-xs-3 card_icon">
                <i class="fa fa-users fa-5x"></i>
              </div>
              <div class="col-xs-9 card_text">
                <h1 class="text-center"><?php echo $sell_count; ?> </h1>
                <h5 class="text-right right_comment">Today's Sells</h5>
              </div>
            </div>
          </div>
          <br>
          <div class="card-header ">
            <a href="sales.php">All Sells  <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>

      </div>
      <!-- ..... -->

    </div>
    <br>
    <br>
    <hr>
    <h2 style="text-align:center">Latest Product</h2>
    <div class="row">
      <div class="offset-md-1 col-md-10 offset-1 col-10">

        <?php
          $product_view_query = "SELECT * FROM product ORDER BY id DESC LIMIT 3";

          $product_view_run = mysqli_query($connection,$product_view_query);
          if (mysqli_num_rows($product_view_run) > 0) {



         ?>
        <table class="table">
          <thead class="thead-dark">
            <tr>

              <th scope="col">Product Name</th>
              <th scope="col">Catagory</th>
              <th scope="col">Price</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($product_view_row = mysqli_fetch_array($product_view_run)) {
              $product_sl = $product_view_row['id'];
              $product_name = $product_view_row['product_name'];
              $product_price = $product_view_row['price'];
              $product_catagory = $product_view_row['catagory'];


             ?>
            <tr>
            
              <td><?php echo "$product_name"; ?> </td>
              <td><?php echo "$product_catagory"; ?> </td>
              <td><?php echo "$product_price"; ?> </td>

            </tr>
          <?php } ?>

          </tbody>
        </table>
      <?php } ?>



      </div>


    </div>


  </div>

</div>






































<?php include 'includes/footer.php'; ?>
