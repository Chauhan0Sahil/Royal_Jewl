
    <?php 
      require_once("header.php");
      require_once("connection.php");
      // $nm1=$nm2=$em1=$em2=$msg1=$msg2="";
         $nm1=$em1=$msg1="";
      // $nm1error=$nm2error=$em1error=$em2error=$msg1error=$msg2error="";

      if(isset($_POST['s1'])){
        $nm1=$_POST['nm1'];
        $em1=$_POST['em1'];
        $msg1=$_POST['msg1'];

        $qry="insert into feedback (name,email,message) values ('$nm1','$em1','$msg1')";
        if(mysqli_query($cn,$qry)){
          header('location:home.php');
        }
        else{
          echo"Error";
        }
      }

      // if(isset($_POST['s2'])){
      //   $nm2=$_POST['nm2'];
      //   $em2=$_POST['em2'];
      //   $msg2=$_POST['msg2'];

      //   $qry="insert into questions (question_text) values ('$msg2')";
      //   if(mysqli_query($cn,$qry)){
      //     header('location:home.php');
      //   }
      //   else{
      //     echo"Error";
      //   }
      // }
      
    ?>
    <!--  -->
    <div>
      <div class="ab"><div class="nm">CONTACT US</div></div>
      <div class="pgnm">
        <div>
          <a href="home.php" class="txt">HOME</a><span>/CONTACT US</span>
        </div>
      </div>
    </div>

    <!--  -->
    <br />
    <div class="container">
      <center
        style="border: 4px solid #f4f3f3; padding: 20px; border-radius: 12px"
      >
        <h1 style="color: #fe405e">FEEDBACK</h1>
        <br />
        <form method="post">
          <div class="container ">
            <div class="input-group mb-3 row">
              <input
                type="text"
                class="form-control col-5"
                placeholder="Name"
                value="<?php echo $nm1?>"
                name="nm1"
              />
              <span class="col-1"></span>
              <input
                type="email"
                class="form-control col-5"
                placeholder="Email"
                value="<?php echo $em1?>"
                name="em1"
              />
            </div>
            <textarea
              cols="10"
              rows="5"
              class="form-control"
              placeholder="Feedback Message..."
              style="overflow: hidden"
              name="msg1"
            ></textarea>

            <center>
            <div>
              <input class="rm2 form-control" name= "s1" type="submit"/ >
            </div>
            </center>
          </div>
        </form>
      </center>
    </div>

    <!--  -->
    <br /><br />
    <div class="container">
      <div class="row">
        <center class="col-4">
          <h3 style="color: #fe405e">ADDRESS</h3>
          <div class="px-5">
             Rajhans Montessa 405-408 , Surat, Gujarat 395006
          </div>
        </center>
        <center class="col-4">
          <h3 style="color: #fe405e">PHONE</h3>
          <div>+91 78799 78954</div>
          <div>+91 95456 78954</div>
        </center>
        <center class="col-4">
          <h3 style="color: #fe405e">EMAIL</h3>
          <div>sales@royaljewelers.com</div>
          <div>info@royaljewelers.com</div>
        </center>
      </div>
      <br /><br />
      <hr style="border: 2px solid #dadada" />
    </div>

    <!--  -->
    <br />
    <br />
    <!-- <div class="container">
      <center>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.4965242682006!2d72.85467961057246!3d21.212150581373596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e63a5de0acb%3A0xe7e8ceb7e6ac91b9!2z8J2XpfCdl7zwnZiG8J2XrvCdl7kg8J2XnfCdl7LwnZiE8J2XsvCdl7nwnZey8J2Xv_CdmIAgLSBCZXN0IEpld2VsbGVyeSBTaG9wIC8gQmVzdCBHb2xkIEpld2VsbGVyeSAvIEpld2VsbGVyeSBzaG9wIGluIFN1cmF0!5e0!3m2!1sen!2sin!4v1692167035812!5m2!1sen!2sin"
          width="800"
          height="600"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </center>
      <br /><br />
      <hr style="border: 2px solid #dadada" />
    </div> -->

    <br />

    <!--  -->
    <!-- <div class="container" id="sec">
      <center
        style="border: 4px solid #f4f3f3; padding: 20px; border-radius: 12px"
      >
        <h1 style="color: #fe405e">HAVE ANY QUESTIONS?</h1>
        <br />
        <h3>DROP A LINE...!</h3>
        <br />
        <form method="post">
          <div class="container">
            <div class="input-group mb-3 row">
              <input
                type="text"
                class="form-control col-5"
                placeholder="Name"
                value="<?php echo $nm2?>"
                name=nm2
              />
              <span class="col-1"></span>
              <input
                type="email"
                class="form-control col-5"
                placeholder="Email"
                value="<?php echo $em2?>"
                name=em2
              />
            </div>
            <textarea
              cols="10"
              rows="5"
              class="form-control"
              placeholder="Your question..."
              style="overflow: hidden"
              value="<?php echo $msg2?>"
                name=msg2
            ></textarea>

            <center>
              <div>
              <input class="rm2 form-control" name= "s2" type="submit"/ >
              </div>
            </center>
          </div>
        </form>
      </center>
      <br />
      <hr style="border: 2px solid #dadada" />
    </div> -->

    <?php require_once("footer.php")?>

