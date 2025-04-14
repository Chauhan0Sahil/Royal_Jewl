<?php

  require_once('connection.php');
  $nm=$pw=$cpw=$em=$phno=$gen=$city="";
  $nmerror=$pwerror=$cpwerror=$emerror=$phnoerror=$generror=$cityerror="";


  if(isset($_POST['s1'])){
   
    $nm=$_POST['unm'];
    $pw=$_POST['upw'];
    $cpw=$_POST['cupw'];
    $em=$_POST['uem'];
    $phno=$_POST['uphno'];
    $gen=$_POST['ugen'];
    $city=$_POST['ucity'];

    if(Empty($nm)){
      $nmerror="Please Enter Name*";
    }else{
      if(!preg_match("/^[A-Za-z]+$/",$nm))
      $nmerror="Username Contains Alphabets Only.";
    }

    if(Empty($pw)){
        $pwerror="Please Enter Password*";
    }else{
      if(strlen($pw)<6)
        $pwerror="Password should contains minimum 6 character";
    }


    if(Empty($cpw)){
      $cpwerror="Please Enter Confirm Password*";
    }else{
      if(strcmp($cpw,$pw)!==0)
        $cpwerror="Password doesn't match";
    }

    if(Empty($em)){
      $emerror="Please Enter Email*";
    }else{
      if(!filter_var($em,FILTER_VALIDATE_EMAIL))
      $emerror="Please Enter Email Properly";
    }


    if(Empty($phno)){
        $phnoerror="Please Enter Phone number* ";
    }else{
      if(!preg_match("/^[0-9]$/",$phno)&&strlen($phno)!==10)
        $phnoerror="Please Enter Phone Number Properly";
    }

    if($nmerror===""&&$pwerror===""&&$cpwerror===""&&$emerror===""&&$phnoerror===""&&$generror===""&&$cityerror==""){
      
      $qry="insert into user (unm,pw,email,phno,gen,city) values('$nm','$pw','$em','$phno','$gen','$city')";
      if(mysqli_query($cn,$qry)){
        header("location:login.php");
      }
      else{
        echo "Sorry";
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
<body >
<section class="h-100 gradient-custom" style="background-color: #000;" >
  <div class="container  h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center" style="color:red;">Registration Form</h3>
            <form method="POST">

              <div class="row">
                <div class="col-md-12 mb-4">
                <label class="form-label" for="firstName">User Name</label>
                  <div class="form-outline">
                    <input type="text" id="firstName" class="form-control form-control-lg" name="unm" value="<?php echo $nm?>" />
                    <label style="color:red" ><?php echo $nmerror?></label>
                 
                  </div>

                </div>
             
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                <label class="form-label" for="pw">Password</label>
                  <div class="form-outline">
                    <input type="password" id="pw"  name="upw" class="form-control form-control-lg" value="<?php echo $pw?>"/>
                    <label style="color:red" ><?php echo $pwerror?></label>
                 
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                  <label class="form-label" for="phoneNumber">Confirm Password</label>
                    <input type="password" id="cpw" class="form-control form-control-lg" name="cupw" value="<?php echo $cpw?>"/>
                    <label style="color:red" ><?php echo $cpwerror?></label>
                 
                  </div>

                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                <label class="form-label" for="emailAddress">Email</label>
                  <div class="form-outline">
                    <input type="text" id="emailAddress" class="form-control form-control-lg" name="uem" value="<?php echo $em?>"/>
                    <label style="color:red" ><?php echo $emerror?></label>
                 
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                  <label class="form-label" for="phoneNumber">Phone Number</label>
                    <input type="tel" id="phoneNumber" class="form-control form-control-lg" name="uphno" value="<?php echo $phno?>"/>
                    <label style="color:red" ><?php echo $phnoerror?></label>
                 
                  </div>

                </div>
              </div>

              <div class="row">
              <div class="col-md-6 mb-4">

                    <h6 class="mb-2 pb-1">Gender: </h6>

                    <div class="form-check form-check-inline">
                  
                      <input class="form-check-input" type="radio" name="ugen" id="maleGender"
                        value="Male" checked/>
                      <label class="form-check-label" for="maleGender">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="ugen" id="femaleGender"
                        value="Female"  />
                      <label class="form-check-label" for="femaleGender">Female</label>
                    </div>

                    

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="ugen" id="otherGender"
                        value="Other" />
                      <label class="form-check-label" for="otherGender">Other</label>
                    </div>

                  </div>
                <div class="col-md-6 mb-4">

                  <select class="select form-control form-control-lg" name="ucity">
                  <label class="form-label select-label">City</label>
                    <option  disabled>--select city--</option>
                    <option >Surat</option>
                    <option >Ahemdabad</option>
                    <option >Vadodara</option>
                    <option>Other</option>
                  </select>
              

                </div>
              </div>

              <div class="mt-4 pt-2 text-center"  >
                <input class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" value="Register" name="s1"/>
              </div>
              <div class="mt-1 pt-2 text-center"  >
                <a href="login.php">Log In</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
</body>