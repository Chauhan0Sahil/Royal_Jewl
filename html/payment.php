<?php
session_start();
require_once('connection.php');

$cnoError = $cvvError = $ExpiryError = $cnmError = "";
$cno = $cvv = $expiry = $cnm = "";
$pm = "cod";
$med = $_SESSION["pnm"];
$quan = $_SESSION["quan"];
$nm = $_SESSION["nm"];
$pno = $_SESSION["pno"];
$email = $_SESSION["email"];
$address = $_SESSION["address"];
$code = $_SESSION["pincode"];

$price=0;
$qry = mysqli_query($cn, "SELECT * FROM products WHERE id =" . $med);
#echo "SELECT * FROM `products` WHERE id =" . $med;

if ($qry) {
  $row = mysqli_fetch_assoc($qry);
  $price = $row['price'];
$total = $price * $quan;
} else {
  echo "Query failed";
}
if (isset($_POST['s1'])) {

  $pm = $_POST['pm'];
  $cno = $_POST['cardno'];
  echo $cno;
  $cnm = $_POST['cardnm'];
  $expiry = $_POST['expirydt'];
  $cvv = $_POST['cvv'];

  if ($pm == 'card') {

    if (empty($cno)) {
      $cnoError = "Required*";
      
    } else {
      if (strlen($cno) !== 12) {
        $cnoError = "Cardno. has 12 digits. Please enter properly";
        
      }
    }
    if (empty($cnm)) {
      $cnmError = "Required*";
    }
    if (empty($cvv)) {
      $cvvError = "Required*";
    } else {
      if (strlen($cvv) !== 3) {
        $cvvError = "Please enter properly";
      }
    }
    if (empty($expiry)) {
      $ExpiryError = "Required*";
    }

    if ($cnoError == "" && $cvvError == "" && $ExpiryError == "" && $cnmError == "") {
      $qry = "insert into purchase(unm, phno, pid, quantity, address, payment_type, cardno, cvv, total) values('$nm','$pno',$med,$quan,'$address','$pm','$cno',$cvv,'$total')";
      if (mysqli_query($cn, $qry)) {
        echo '<script>if (confirm("Your order is placed successfully..")) {
      window.location.href = "home.php";
  }</script>';
      }
    } 


}   else {
  $cno = $cvv = $expiry = $cnm = "";
  $qry = "insert into purchase(unm, phno, pid, quantity, address, payment_type) values('$nm','$pno',$med,$quan,'$address','$pm')";
  if (mysqli_query($cn, $qry)) {
    echo '<script>if (confirm("Your order is placed successfully..")) {
  window.location.href = "home.php";
}</script>';
  }
   else {
    echo "Sorry";
    echo mysqli_error($cn);
  }
}

}
?>


<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    .gradient-custom-2 {
      /* fallback for old browsers */
      background: #fccb90;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linea r-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }

    .gradient-custom {

      background: #fccb90;

      background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

      background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }

    .card-registration .select-input.form-control[readonly]:not([disabled]) {
      font-size: 1rem;
      line-height: 2.15;
      padding-left: .75em;
      padding-right: .75em;
    }

    .card-registration .select-arrow {
      top: 13px;
    }

    @media (min-width: 768px) {
      .gradient-form {
        height: 100vh !important;
      }
    }

    @media (min-width: 769px) {
      .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
      }
    }
  </style>

</head>

<body>
  <section class="h-100 gradient-custom" style="background-color: #000;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
              <div class="text-center mb-4">
                <h3 class="text-danger">Payment</h3>
              </div>
              <form method="post">


                <h4 class="fw-bold mb-4">Total :<?php echo $total; ?></h4>
                <div class="col-lg-5">
                  <label for="">Payment Method</label>
                  <div class="mt-2 fw-medium">
                    <input class="form-check-input" type="radio" name="pm" value="upi" <?php if ($pm === "upi") echo " checked" ?> />UPI <br>
                    <input class="form-check-input" type="radio" name="pm" value="card" <?php if ($pm === "card") echo " checked" ?> /> Credit/Debit Card<br />
                    <span class="col-lg-2"></span>
                    <input class="form-check-input" type="radio" name="pm" value="cod" <?php if ($pm === "cod") echo " checked" ?> />
                    COD<br />

                  </div>
                </div>
                <h4 class="text-center text-danger">Card Details</h4><br>
                <div class="form-outline mb-4">
                  <input type="text" id="formControlLgXsd" class="form-control form-control-lg" value="<?php echo $cnm ?>" name="cardnm" placeholder="Cardholder's Name" />
                  <div class="fw-normal" style="color: red"><?php echo $cnmError; ?></div>
                </div>

                <div class="row mb-4">
                  <div class="col-7">
                    <div class="form-outline">
                      <input type="text" id="formControlLgXM" class="form-control form-control-lg" name="cardno" placeholder="Card Number" value="<?php echo $cno ?>" />
                      <div class="fw-normal" style="color: red"><?php echo $cnoError;?></div>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-outline">
                      <input type="text" id="formControlLgExpk" class="form-control form-control-lg" placeholder="MM/YY" name="expirydt" value="<?php echo $expiry ?>" />
                      <div class="fw-normal" style="color: red"><?php echo $ExpiryError; ?></div>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="form-outline">
                      <input type="password" id="formControlLgcvv" class="form-control form-control-lg" placeholder="cvv" name="cvv" value="<?php echo $cvv ?>" />

                      <div class="fw-normal" style="color: red"><?php echo $cvvError; ?></div>
                    </div>
                  </div>
                </div>

                <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 form-control btn1" type="submit" name=s1>Place Order</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
</body>