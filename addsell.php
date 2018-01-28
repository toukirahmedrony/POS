<?php include 'includes/header.php'; ?>

<?php include 'includes/nav.php'; ?>
<div class="row">
  <div class="col-md-3">
    <?php include 'includes/sidemanu.php'; ?>
  </div>

  <div class="col-md-9">
    <br>
    <div class="row">
      <div class="col-md-3">
        <button class="btn btn-secondary btn-block"type="button" disabled>Registration</button>
      </div>
      <div class="col-md-3">
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#instanc_registration">Add new customer</button>
      </div>
      <div class="col-md-3">
        <button type="button" id="refresh_button" class="btn btn-primary btn-block"  onclick="refreshpage()">Refresh Email</button>
      </div>

    </div>


    <br>

    <hr>
    <?php
      if (isset($_POST['sell_submit'])) {
        $customer_email =$_POST['ajax_customer_email'];
        $customer_name =$_POST['ajax_customer_name'];
        $product_catagory =$_POST['ajax_product_catagory'];
        $product_name =$_POST['ajax_product_name'];
        $product_price =$_POST['ajax_product_price'];
        $renewal_option =$_POST['ajax_renewal'];
        $today_date = $_POST['today_date'];
        $renewal_date = $_POST['ajax_renewal_date'];
        $order_insert_query = "INSERT INTO `sell`(`customer_name`, `customer_email`, `product_name`, `product_catagory`,`product_price`, `renewal option`, `buy_date`, `expiry_date`) VALUES('$customer_name','$customer_email','$product_name','$product_catagory','$product_price','$renewal_option','$today_date','$renewal_date')";
        if (mysqli_query($connection,$order_insert_query)) {
          echo "<div class='alert alert-success' role='alert'>
                  Sell has been added
                  </div>";
                    header("Refresh:1; url=sales.php");
        }



      }
     ?>

    <div class="row">
      <div class="offset-md-2 col-md-6 offset-sm-2 col-sm-6 offset-2 col-8 email_check">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
           <label for="customer">Customer email</label>
           <select class="form-control" id="ajax_customer_email" name="ajax_customer_email">
             <?php
               $customer_info_query = "SELECT * FROM users ORDER BY id DESC";
               $customer_info_run =mysqli_query($connection,$customer_info_query);
               ?>
                <option value="">Select Email</option>
               <?php
               while ($customer_info_row = mysqli_fetch_array($customer_info_run)) {
                 $customer= $customer_info_row['email'];
              ?>

             <option value="<?php echo "$customer"; ?>"><?php echo "$customer"; ?> </option>

             <?php } ?>
             </select>
           </div>





           <div class="form-group">
              <label for="customer">Customer Name</label>
              <select class="form-control" id="ajax_customer_name" name="ajax_customer_name">
                <option value="">Name </option>
              </select>
          </div>

          <div class="form-group">
           <label for="product">Prduct Catagory</label>
           <select class="form-control" id="ajax_product_catagory" name="ajax_product_catagory">
             <?php
               $product_info_query = "SELECT * FROM product ORDER BY id DESC";
               $product_info_run =mysqli_query($connection,$product_info_query);
               ?>
                <option value="">Select Catagory</option>
               <?php
               while ($product_info_row = mysqli_fetch_array($product_info_run)) {
                 $product_catagory= $product_info_row['catagory'];
              ?>

             <option value="<?php echo "$product_catagory"; ?>"><?php echo "$product_catagory"; ?> </option>

             <?php } ?>
           </select>
         </div>

         <div class="form-group">
          <label for="product">Product Name</label>
          <select class="form-control" id="ajax_product_name" name="ajax_product_name">
            <option value=""> Product Name</option>
          </select>
        </div>

        <div class="form-group">
         <label for="product">Product Price</label>
         <select class="form-control" id="ajax_product_price" name="ajax_product_price">
           <option value=""> Product price</option>
         </select>
       </div>

       <div class="form-group">
        <label for="product">Renewal Option</label>
        <select class="form-control" id="ajax_renewal" name="ajax_renewal">
          <option value="">Please Select One</option>
          <option value="Monthly">Monthly</option>
          <option value="Yearly">Yearly</option>
        </select>
      </div>

      <div class="form-group">
       <label for="product">Today's Date</label>
       <?php
        $currentDate = date("Y-m-d");
        ?>
        <input type="text" class="form-control" name="today_date" value="<?php echo "$currentDate" ?> ">
     </div>
     <div class="form-group" >
      <label for="product">Expiry Date</label>
      <select class="form-control" id="ajax_renewal_date" name="ajax_renewal_date">
        <option value=""></option>
      </select>
    </div>





      <div class="form-group">

       <input type="submit" class="form_control btn btn-success"name="sell_submit" value="Sell Submit">
     </div>



        </form>


      </div>

    </div>
    <br>
    <br>





  </div>

</div>




<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="instanc_registration" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="offset-md-2 col-md-8 email_check">
            <form class="" action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="name" class="form-control" id="ajax_reg_name" placeholder="Customer  Name" required>
              </div>
              <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" name="email" class="form-control" id="ajax_reg_email" placeholder="Customer email" required>
              </div>
              <div class="form-group">
                <label for="Email">Phone Number</label>
                <input type="text" name="email" class="form-control" id="ajax_reg_phone" placeholder="Customer number" required>
              </div>


              <?php
                $countries = array("AF" => "Afghanistan",
                                  "AX" => "Åland Islands",
                                  "AL" => "Albania",
                                  "DZ" => "Algeria",
                                  "AS" => "American Samoa",
                                  "AD" => "Andorra",
                                  "AO" => "Angola",
                                  "AI" => "Anguilla",
                                  "AQ" => "Antarctica",
                                  "AG" => "Antigua and Barbuda",
                                  "AR" => "Argentina",
                                  "AM" => "Armenia",
                                  "AW" => "Aruba",
                                  "AU" => "Australia",
                                  "AT" => "Austria",
                                  "AZ" => "Azerbaijan",
                                  "BS" => "Bahamas",
                                  "BH" => "Bahrain",
                                  "BD" => "Bangladesh",
                                  "BB" => "Barbados",
                                  "BY" => "Belarus",
                                  "BE" => "Belgium",
                                  "BZ" => "Belize",
                                  "BJ" => "Benin",
                                  "BM" => "Bermuda",
                                  "BT" => "Bhutan",
                                  "BO" => "Bolivia",
                                  "BA" => "Bosnia and Herzegovina",
                                  "BW" => "Botswana",
                                  "BV" => "Bouvet Island",
                                  "BR" => "Brazil",
                                  "IO" => "British Indian Ocean Territory",
                                  "BN" => "Brunei Darussalam",
                                  "BG" => "Bulgaria",
                                  "BF" => "Burkina Faso",
                                  "BI" => "Burundi",
                                  "KH" => "Cambodia",
                                  "CM" => "Cameroon",
                                  "CA" => "Canada",
                                  "CV" => "Cape Verde",
                                  "KY" => "Cayman Islands",
                                  "CF" => "Central African Republic",
                                  "TD" => "Chad",
                                  "CL" => "Chile",
                                  "CN" => "China",
                                  "CX" => "Christmas Island",
                                  "CC" => "Cocos (Keeling) Islands",
                                  "CO" => "Colombia",
                                  "KM" => "Comoros",
                                  "CG" => "Congo",
                                  "CD" => "Congo, The Democratic Republic of The",
                                  "CK" => "Cook Islands",
                                  "CR" => "Costa Rica",
                                  "CI" => "Cote D'ivoire",
                                  "HR" => "Croatia",
                                  "CU" => "Cuba",
                                  "CY" => "Cyprus",
                                  "CZ" => "Czech Republic",
                                  "DK" => "Denmark",
                                  "DJ" => "Djibouti",
                                  "DM" => "Dominica",
                                  "DO" => "Dominican Republic",
                                  "EC" => "Ecuador",
                                  "EG" => "Egypt",
                                  "SV" => "El Salvador",
                                  "GQ" => "Equatorial Guinea",
                                  "ER" => "Eritrea",
                                  "EE" => "Estonia",
                                  "ET" => "Ethiopia",
                                  "FK" => "Falkland Islands (Malvinas)",
                                  "FO" => "Faroe Islands",
                                  "FJ" => "Fiji",
                                  "FI" => "Finland",
                                  "FR" => "France",
                                  "GF" => "French Guiana",
                                  "PF" => "French Polynesia",
                                  "TF" => "French Southern Territories",
                                  "GA" => "Gabon",
                                  "GM" => "Gambia",
                                  "GE" => "Georgia",
                                  "DE" => "Germany",
                                  "GH" => "Ghana",
                                  "GI" => "Gibraltar",
                                  "GR" => "Greece",
                                  "GL" => "Greenland",
                                  "GD" => "Grenada",
                                  "GP" => "Guadeloupe",
                                  "GU" => "Guam",
                                  "GT" => "Guatemala",
                                  "GG" => "Guernsey",
                                  "GN" => "Guinea",
                                  "GW" => "Guinea-bissau",
                                  "GY" => "Guyana",
                                  "HT" => "Haiti",
                                  "HM" => "Heard Island and Mcdonald Islands",
                                  "VA" => "Holy See (Vatican City State)",
                                  "HN" => "Honduras",
                                  "HK" => "Hong Kong",
                                  "HU" => "Hungary",
                                  "IS" => "Iceland",
                                  "IN" => "India",
                                  "ID" => "Indonesia",
                                  "IR" => "Iran, Islamic Republic of",
                                  "IQ" => "Iraq",
                                  "IE" => "Ireland",
                                  "IM" => "Isle of Man",
                                  "IL" => "Israel",
                                  "IT" => "Italy",
                                  "JM" => "Jamaica",
                                  "JP" => "Japan",
                                  "JE" => "Jersey",
                                  "JO" => "Jordan",
                                  "KZ" => "Kazakhstan",
                                  "KE" => "Kenya",
                                  "KI" => "Kiribati",
                                  "KP" => "Korea, Democratic People's Republic of",
                                  "KR" => "Korea, Republic of",
                                  "KW" => "Kuwait",
                                  "KG" => "Kyrgyzstan",
                                  "LA" => "Lao People's Democratic Republic",
                                  "LV" => "Latvia",
                                  "LB" => "Lebanon",
                                  "LS" => "Lesotho",
                                  "LR" => "Liberia",
                                  "LY" => "Libyan Arab Jamahiriya",
                                  "LI" => "Liechtenstein",
                                  "LT" => "Lithuania",
                                  "LU" => "Luxembourg",
                                  "MO" => "Macao",
                                  "MK" => "Macedonia, The Former Yugoslav Republic of",
                                  "MG" => "Madagascar",
                                  "MW" => "Malawi",
                                  "MY" => "Malaysia",
                                  "MV" => "Maldives",
                                  "ML" => "Mali",
                                  "MT" => "Malta",
                                  "MH" => "Marshall Islands",
                                  "MQ" => "Martinique",
                                  "MR" => "Mauritania",
                                  "MU" => "Mauritius",
                                  "YT" => "Mayotte",
                                  "MX" => "Mexico",
                                  "FM" => "Micronesia, Federated States of",
                                  "MD" => "Moldova, Republic of",
                                  "MC" => "Monaco",
                                  "MN" => "Mongolia",
                                  "ME" => "Montenegro",
                                  "MS" => "Montserrat",
                                  "MA" => "Morocco",
                                  "MZ" => "Mozambique",
                                  "MM" => "Myanmar",
                                  "NA" => "Namibia",
                                  "NR" => "Nauru",
                                  "NP" => "Nepal",
                                  "NL" => "Netherlands",
                                  "AN" => "Netherlands Antilles",
                                  "NC" => "New Caledonia",
                                  "NZ" => "New Zealand",
                                  "NI" => "Nicaragua",
                                  "NE" => "Niger",
                                  "NG" => "Nigeria",
                                  "NU" => "Niue",
                                  "NF" => "Norfolk Island",
                                  "MP" => "Northern Mariana Islands",
                                  "NO" => "Norway",
                                  "OM" => "Oman",
                                  "PK" => "Pakistan",
                                  "PW" => "Palau",
                                  "PS" => "Palestinian Territory, Occupied",
                                  "PA" => "Panama",
                                  "PG" => "Papua New Guinea",
                                  "PY" => "Paraguay",
                                  "PE" => "Peru",
                                  "PH" => "Philippines",
                                  "PN" => "Pitcairn",
                                  "PL" => "Poland",
                                  "PT" => "Portugal",
                                  "PR" => "Puerto Rico",
                                  "QA" => "Qatar",
                                  "RE" => "Reunion",
                                  "RO" => "Romania",
                                  "RU" => "Russian Federation",
                                  "RW" => "Rwanda",
                                  "SH" => "Saint Helena",
                                  "KN" => "Saint Kitts and Nevis",
                                  "LC" => "Saint Lucia",
                                  "PM" => "Saint Pierre and Miquelon",
                                  "VC" => "Saint Vincent and The Grenadines",
                                  "WS" => "Samoa",
                                  "SM" => "San Marino",
                                  "ST" => "Sao Tome and Principe",
                                  "SA" => "Saudi Arabia",
                                  "SN" => "Senegal",
                                  "RS" => "Serbia",
                                  "SC" => "Seychelles",
                                  "SL" => "Sierra Leone",
                                  "SG" => "Singapore",
                                  "SK" => "Slovakia",
                                  "SI" => "Slovenia",
                                  "SB" => "Solomon Islands",
                                  "SO" => "Somalia",
                                  "ZA" => "South Africa",
                                  "GS" => "South Georgia and The South Sandwich Islands",
                                  "ES" => "Spain",
                                  "LK" => "Sri Lanka",
                                  "SD" => "Sudan",
                                  "SR" => "Suriname",
                                  "SJ" => "Svalbard and Jan Mayen",
                                  "SZ" => "Swaziland",
                                  "SE" => "Sweden",
                                  "CH" => "Switzerland",
                                  "SY" => "Syrian Arab Republic",
                                  "TW" => "Taiwan, Province of China",
                                  "TJ" => "Tajikistan",
                                  "TZ" => "Tanzania, United Republic of",
                                  "TH" => "Thailand",
                                  "TL" => "Timor-leste",
                                  "TG" => "Togo",
                                  "TK" => "Tokelau",
                                  "TO" => "Tonga",
                                  "TT" => "Trinidad and Tobago",
                                  "TN" => "Tunisia",
                                  "TR" => "Turkey",
                                  "TM" => "Turkmenistan",
                                  "TC" => "Turks and Caicos Islands",
                                  "TV" => "Tuvalu",
                                  "UG" => "Uganda",
                                  "UA" => "Ukraine",
                                  "AE" => "United Arab Emirates",
                                  "GB" => "United Kingdom",
                                  "US" => "United States",
                                  "UM" => "United States Minor Outlying Islands",
                                  "UY" => "Uruguay",
                                  "UZ" => "Uzbekistan",
                                  "VU" => "Vanuatu",
                                  "VE" => "Venezuela",
                                  "VN" => "Viet Nam",
                                  "VG" => "Virgin Islands, British",
                                  "VI" => "Virgin Islands, U.S.",
                                  "WF" => "Wallis and Futuna",
                                  "EH" => "Western Sahara",
                                  "YE" => "Yemen",
                                  "ZM" => "Zambia",
                                  "ZW" => "Zimbabwe");
               ?>
               <div class="form-group">
                 <label for="Email">Country</label>
                 <select class="form-control" name="countries" id="ajax_reg_country">
                  <?php

                  foreach($countries as $key => $value) {

                  ?>
                  <option value="<?= $key ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
                  <?php

                  }

                  ?>
                  </select>
               </div>
               <div class="form-group">
                 <label for="Email">Adress</label>
                 <input type="text" name="email" class="form-control" id="ajax_reg_adress" placeholder="Customer adress" required>
               </div>


              <div class="form-group">

                <input type="submit" class="btn btn-primary" id="reg_submit" name="reg_submit" onclick="modalreg()" value="Registration">
              </div>

            </form>


          </div>

        </div>
      </div>

    </div>
  </div>
</div>







<script type="text/javascript">



$(document).ready(function(){
  // alert("HI");
  $("#ajax_customer_email").change(function email(){
    var email = $(this).val(); 
    $.post(
      "ajax.php",
      {update_email : email},//যেটা এজাক্স পেজে যাবে
      function(data){
        $("#ajax_customer_name").html(data);//আউটপুট ডিভ
      }
    )
  });


  $("#ajax_product_catagory").change(function catagory(){
    var catagory = $(this).val();
    $.post(
      "ajax.php",
      {update_catagory : catagory},
      function(data){
        $("#ajax_product_name").html(data);
      }
    )
  });


  $("#ajax_product_name").change(function price(){
    var product_name = $(this).val();
    $.post(
      "ajax.php",
      {update_product_name : product_name},
      function(data){
        $("#ajax_product_price").html(data);
      }
    )
  });

  $("#ajax_renewal").change(function renewal(){
    var renewal = $(this).val();
    $.post(
      "ajax.php",
      {update_renewal : renewal},
      function(data){
        $("#ajax_renewal_date").html(data);
      }
    )
  });



// বাটনের সাহায্যে রিফ্রেশ
  $("#refresh_button").click(function refresh() {

    $.ajax({    //create an ajax request to display.php
      type: "GET",
      url: "catagory_refresh.php",
      dataType: "html",   //expect html to be returned
      success: function(response){
          $("#ajax_customer_email").html(response);
          //alert(response);
      }

  });
});

});




// মডাল ফর্ম রেজিস্ট্রেশন ফাংশন
function modalreg() {
var ajax_reg_name = document.getElementById("ajax_reg_name").value;
var ajax_reg_email = document.getElementById("ajax_reg_email").value;
var ajax_reg_phone = document.getElementById("ajax_reg_phone").value;
var ajax_reg_adress = document.getElementById("ajax_reg_adress").value;
var ajax_reg_country = document.getElementById("ajax_reg_country").value;

// Returns successful data submission message when the entered information is stored in database.
var dataString = 'ajax_reg_name1=' + ajax_reg_name + '&ajax_reg_email1=' + ajax_reg_email + '&ajax_reg_phone1=' + ajax_reg_phone + '&ajax_reg_adress1=' + ajax_reg_adress + '&ajax_reg_country1=' + ajax_reg_country;
if (ajax_reg_name == '' || ajax_reg_name == '' || ajax_reg_phone == '' || ajax_reg_adress == '' || ajax_reg_country == '') {
alert("Please Fill All Fields");
} else {
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "modal.php",
data: dataString,
cache: false,
// success:function(data) { $('ajax_customer_email').html(data); }
success: function(html) {

}
});
}
return false;
}



</script>
<!-- <script type="text/javascript">

$(document).ready(function(){

});


</script> -->
























<?php include 'includes/footer.php'; ?>
