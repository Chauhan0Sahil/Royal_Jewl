<?php

  require_once('connection.php');
  $nm=$pw="";
  $nmerror=$pwerror="";

  if(isset($_POST['s1'])){
    $nm=$_POST['unm'];
    $pw=$_POST['upw'];

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



    if($nmerror===""&&$pwerror===""){
      $qry="update user set pw='$pw' where unm='$nm'";
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
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center" style="color:red;">Reset Password</h3>
            <form method="post">

              <div class="row">
                <div class="col-md-12 mb-4">
                <label class="form-label" for="firstName">User Name</label>
                  <div class="form-outline">
                    <input type="text" id="firstName" class="form-control form-control-lg" name="unm" />
                    <label style="color:red" ><?php echo $nmerror?></label>
                 
                  </div>

                </div>
             
              </div>

              <div class="row">
                <div class="col-md-12 mb-4 pb-2">
                <label class="form-label" for="pw">New Password</label>
                  <div class="form-outline">
                    <input type="password" id="pw"  name="upw" class="form-control form-control-lg" />
                    <label style="color:red" ><?php echo $pwerror?></label>
                 
                  </div>

                </div>
           
              </div>
            
              <div class="row">
           

              <div class="mt-4 pt-2 text-center"  >
                <input class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" value="Reset" name="s1"/>
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