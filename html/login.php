
<?php 
  require_once("connection.php");
$nm=$pw="";
$nmerror=$pwerror=$cerror="";

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

      if($pwerror===""&&$nmerror===""){

        if($nm==='admin' && $pw==='admin123'){
          header('location:show_products.php');
        }

        $qry="select * from user where unm='$nm' and pw='$pw'";

        $res=mysqli_query($cn,$qry);
        if($res&&mysqli_num_rows($res) > 0){
          header('location:home.php');
        }
        else{
          $cerror="Incorrect Username or password";
        }
      }
    }


    if(isset($_POST['s2'])){

        header('location:signup.php');
 
    }
    
    
  
  ?>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>



    .gradient-custom-2 {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
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
.btn1:focus{
  outline:none,
  box-shadow:none
}
</style>
</head>
<body>

<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-3 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="../images/logo.png"
                    style="width: 185px;" alt="logo">
                 
                </div><br><br>

                <form method="post">
                  <h1 class="text-center text-danger">LOG IN</h1><br><br>

                  <div class="form-outline mb-4">
                    <input type="text" id="form2Example11" class="form-control" name="unm" value="<?php echo $nm?>"
                      placeholder="username" />
                    
                    <label style="color:red;" class="h6 " ><?php echo $nmerror?></label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example22"  
                    placeholder="password"  value="<?php echo $pw?>"
                    name="upw" class="form-control" />
                    <label style="color:red"class="h6 " ><?php echo $pwerror?></label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 form-control btn1" type="submit" name="s1" >Log
                      in</button>
                      <label style="color:red"class="h6 " ><?php echo $cerror?></label>
                      <a style="color:red"class="h6 text-start " href="forget.php">Forget Password?</a><br>
                     
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <button type="submit" class="btn btn-outline-danger"  name="s2" >Sign Up</button>
                  </div>
                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <label><?php echo $cerror?></label>
                  </div>
                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a jewelers</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>