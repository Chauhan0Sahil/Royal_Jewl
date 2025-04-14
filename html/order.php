<?php
session_start();
require_once("connection.php");

$med = $quan = $pm = $nm = $pno = $email = $hno = $soc = $city = $state = $code = "";
$medError = $quanError = $pmError = $nmError = $pnoError = $emailError = $hnoError = $socError = $cityError =$areaError= $stateError="";
$showmodal = false;
$msg = $error = $location = "";

if (isset($_POST['po'])) {
    $med = $_POST["med"];
    $quan = $_POST["quan"];
  
    $nm = $_POST["nm"];
    $pno = $_POST["pno"];
    $email = $_POST["email"];
    $hno = $_POST["hno"];
    $soc = $_POST["soc"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $code = $_POST["code"];
    $area = $_POST["area"];

    if (empty($med)) {
        $medError = "Select one option*";
    }
    if (empty($quan)) {
        $quanError = "Required*";
    }

    if (empty($nm)) {
        $nmError = "Required*";
    } elseif (!preg_match('/^[A-Za-z]+$/', $nm)) {
        $nmError = "Name can Contain Alphabets Only";
    }
    if (empty($pno)) {
        $pnoError = "Required*";
    } elseif (strlen($pno) != 10) {
        $pnoError = "Please enter valid Phone Number";
    }
    if (empty($email)) {
        $emailError = "Required*";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Please Enter Email Properly";
    }
    if (empty($hno)) {
        $hnoError = "Required*";
    }
    if (empty($soc)) {
        $socError = "Required*";
    }
    if (empty($city)) {
        $cityError = "Required*";
    }

    if (empty($area)) {
        $areaError = "Required*";
    }
    if (empty($state)) {
        $stateError = "Required*";
    }

    if ($medError === "" && $nmError === "" && $pnoError === "" && $emailError === "" && $hnoError === "" && $socError == "" && $cityError === "" && $stateError === "") {
        $_SESSION["pnm"] = $med;
        $_SESSION["quan"] = $quan;
        $_SESSION["nm"] = $nm;
        $_SESSION["pno"] = $pno;
        $_SESSION["email"] = $email;
        $_SESSION["pincode"] = $code;
        $address = $hno . "," . $soc . "," . $city. "," . $area . "," . $state;
        $_SESSION["address"] = $address;
        header("location:payment.php");
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Buy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/medkit_icon.ico" />
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
            /* fallback for old browsers */
            background: #fccb90;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
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
                <div class="col col-xl-10">
                    <div class="card px-5 fw-bold" style="border-radius: 1rem;">
                        <br>
                        <h1 class="mb-1 pb-2 pb-md-0 mb-md-1 text-center" style="color:red;">Order Now</h1>
                        <div class="fw-normal" style="color: red"><?php echo $error; ?></div>
                        <br>
                        <form method="post">
                            <div>
                                <label for="med">Select Product</label>
                                <div>
                                    <select id="med" name="med" class="form-control form-control-lg" value="<?php echo $med; ?>">

                                        <option>Select Type</option>
                                        <?php
                                        $res = mysqli_query($cn, "SELECT * FROM products");
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            echo '<option value="' . $row['id'] . '">' . $row['nm'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <div class="fw-normal" style="color: red"><?php echo $medError; ?></div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="">Quantity</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-minus btn btn-secondary btn-number" data-type="minus" data-field="">
                                                <span class="glyphicon glyphicon-minus fw-bold">-</span>
                                            </button>
                                        </span>
                                        <input type="text" id="quan" name="quan" class="form-control input-number" value="<?php echo isset($_POST['quan']) ? $_POST['quan'] : 1; ?>" min="1" max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-plus btn btn-secondary btn-number" data-type="plus" data-field="">
                                                <span class="glyphicon glyphicon-plus fw-bold">+</span>
                                            </button>
                                        </span>
                                        <div class="fw-normal" style="color: red"><?php echo $quanError; ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-3"></div>

                            </div>
                            <br>
                            <div class="row">
                                <label for="">Personal Details</label>
                                <div class="col-lg-4">
                                    <input class="form-control" type="text" id="nm" name=nm placeholder="Name" value="<?php echo $nm ?>" />
                                    <div class="fw-normal" style="color: red"><?php echo $nmError; ?></div>
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-control" type="number" id="pno" name="pno" placeholder="Phone No." value="<?php echo isset($_POST['pno']) ? $_POST['pno'] : ''; ?>" />
                                    <div class="fw-normal" style="color: red"><?php echo $pnoError; ?></div>
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-control" type="text" id="email" name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" />
                                    <div class="fw-normal" style="color: red"><?php echo $emailError; ?></div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label for="">Address</label>
                                <div class="col-lg-4">
                                    <input class="form-control" type="text" id="hno" name="hno" placeholder="House No." value="<?php echo isset($_POST['hno']) ? $_POST['hno'] : ''; ?>" />
                                    <div class="fw-normal" style="color: red"><?php echo $hnoError; ?></div>
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-control" type="text" id="soc" name="soc" placeholder="Apartment/Society" value="<?php echo isset($_POST['soc']) ? $_POST['soc'] : ''; ?>" />
                                    <div class="fw-normal" style="color: red"><?php echo $socError; ?></div>
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-control" type="text" id="area" name="area" placeholder="Area" value="<?php echo isset($_POST['area']) ? $_POST['area'] : ''; ?>" />
                                    <div class="fw-normal" style="color: red"><?php echo $areaError; ?></div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-4">
                                    <input class="form-control" type="text" id="city" name="city" placeholder="City" value="<?php echo isset($_POST['city']) ? $_POST['city'] : ''; ?>" />
                                    <div class="fw-normal" style="color: red"><?php echo $cityError; ?></div>
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-control" type="text" id="state" name="state" placeholder="State" value="<?php echo isset($_POST['state']) ? $_POST['state'] : ''; ?>" />
                                    <div class="fw-normal" style="color: red"><?php echo $stateError; ?></div>
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-control" type="number" id="code" name="code" placeholder="Postal/Zip Code" value="<?php echo isset($_POST['code']) ? $_POST['code'] : ''; ?>" />
                                </div>
                            </div>
                            <br>
                            <div>
                                <label for="">Special Instruction</label>
                                <textarea class="form-control form-control-lg" row=5></textarea>
                            </div>
                            <br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="po">Place Order</button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
<script>
    $(document).ready(function() {

        var quantitiy = 0;
        $('.quantity-plus').click(function(e) {
            e.preventDefault();
            var quantity = parseInt($('#quan').val());
            $('#quan').val(quantity + 1);
        });

        $('.quantity-minus').click(function(e) {
            e.preventDefault();
            var quantity = parseInt($('#quan').val());
            if (quantity > 0) {
                $('#quan').val(quantity - 1);
            }
        });
    });
</script>

</html>