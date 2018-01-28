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
    <?php
    if (isset($_GET['del'])) {
     $delete_id =$_GET['del'];
     $delete_query = "DELETE FROM users WHERE id = $delete_id";
     if (mysqli_query($connection,$delete_query)) {
       echo "<div class='alert alert-success' role='alert'>
               Customer Has been removed
               </div>";
               header("Refresh:0; url=customer.php");
     }
    }

     ?>

    <div class="row">
      <div class="col-md-3">
        <button class="btn btn-secondary btn-block"type="button" disabled>Customer Manage</button>
      </div>
      <div class="col-md-3">
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addcustomer"
        >Add new customer</button>
      </div>
      <div class="col-md-3">
        <button type="button" id="refresh_button" class="btn btn-primary btn-block"  onclick="refreshpage()">Refresh Customer Table</button>
      </div>



    </div>
    <br>
    <hr>
    <?php
      $customer_info_query ="SELECT * FROM users ORDER BY id DESC";
      $customer_info_run = mysqli_query($connection,$customer_info_query);
      if (mysqli_num_rows($customer_info_run) > 0 ) {


     ?>
  <div class="" id="ajax_table_value">
      <table class="table" id="ajax_output_table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Customer Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Country</th>
          <th scope="col">Adress</th>

          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($customer_info_row = mysqli_fetch_array($customer_info_run)) {
          $customer_id = $customer_info_row ['id'];
          $customer_name = $customer_info_row['name'];
          $customer_email = $customer_info_row['email'];
          $customer_phone = $customer_info_row['phone'];
          $customer_country = $customer_info_row['country'];
          $customer_adress= $customer_info_row['adress'];


         ?>
        <div id="table_data_ajax">
        <tr >
          <td> <?php echo "$customer_name" ?></td>
          <td><?php echo "$customer_email" ?></td>
          <td><?php echo "$customer_phone" ?></td>
          <td><?php echo "$customer_country" ?></td>
          <td><?php echo "$customer_adress" ?></td>



          <td style="text-align: center;"><a href="customer.php?del=<?php echo $customer_id;?>" style="color:red;" ><i class="fa fa-times" aria-hidden="true"></i></a> </td>
        </tr>
      </div>
      <?php } ?>


      </tbody>
    </table>
  <?php }else {
    echo "No Customer Yet";
  } ?>
  </div>







  </div>




</div>
<!-- এডিট কাস্টোমার মডিউল -->









<!-- Modal -->
<div class="modal fade" id="addcustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Customer Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="offset-md-2 col-md-8 email_check">
            <form class="" action="" method="post" id="customer_insert" enctype="multipart/form-data">
              <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="ajax_reg_name" class="form-control" id="ajax_reg_name" placeholder="Customer  Name" required>
              </div>
              <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" name="ajax_reg_email" class="form-control" id="ajax_reg_email" placeholder="Customer email" required>
              </div>
              <div class="form-group">
                <label for="Email">Phone Number</label>
                <input type="text" name="ajax_reg_number" class="form-control" id="ajax_reg_number" placeholder="Customer number" required>
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
                 <select class="form-control" name="ajax_reg_country" id="ajax_reg_country">
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
                 <input type="text" name="ajax_reg_adress" class="form-control" id="ajax_reg_adress" placeholder="Customer adress" required>
               </div>


              <div class="form-group">

                <input type="submit" class="btn btn-primary" id="reg_submit" name="reg_submit" value="Registration" onclick="modalreg()">
              </div>

            </form>


          </div>

        </div>
      </div>

    </div>
  </div>
</div>


<script type="text/javascript">

// বাটনের সাহায্যে রিফ্রেশ





function refreshpage(){

  $('#refresh_button').click(function refresh (){
    $.ajax({
        url:"customer_table_refresh.php",
        type:"GET",
        datatype: "html",
        success: function(response){
          $('#ajax_output_table').html(response);
        }
    });
  });

}

// $(document).ready(function(){
//   $("#refresh_button").click(function refresh() {

//     $.ajax({    //create an ajax request to display.php
//       type: "GET",
//       url: "customer_table_refresh.php",
//       dataType: "html",   //expect html to be returned
//       success: function(response){
//           $("#ajax_output_table").html(response);

//       }

//   });
// });

// });

</script>
<script type="text/javascript">
function modalreg() {
 $('#customer_insert').on('submit',function(event){
  event.preventDefault();
  if ($('#ajax_reg_name').val() == '')
  {
    alert("Name is required");
  }else if($('#ajax_reg_email').val() == '')
  {
    alert("Email is required");
  }else if($('#ajax_reg_phone').val() == '')
  {
    alert("Email is required");
  }else if($('#ajax_reg_country').val() == '')
  {
    alert("Email is required");
  }else if($('#ajax_reg_adress').val() == '')
  {
    alert("Email is required");
  }else
  {
    $.ajax({
        url:"customer_entry.php",
        method: "POST",
        data:$('#customer_insert').serialize(),
        success:function(date)
        {
          $('#customer_insert')[0].reset();
          $('#addcustomer').modal('hide');
          $('#table_data_ajax').html(data);
        }
    });

  }





});


}


</script>












































<?php include 'includes/footer.php'; ?>
