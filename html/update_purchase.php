<?php

require_once("connection.php");
$ar1=['Male','Female','Other'];
$ar2=['Surat','Ahemdabad','Vadodara','Other'];
$row = $id = "";
$nm=$pw=$em=$phno=$gen=$city="";

if (isset($_REQUEST['did'])) {
    $id = $_REQUEST['did'];
    $res = mysqli_query($cn, "SELECT * FROM user where id =$id ");
    $row = mysqli_fetch_row($res);
   
}

if (isset($_POST['s1'])) {
    $nm=$_POST['unm'];
    $pw=$_POST['upw'];
    $em=$_POST['uem'];
    $phno=$_POST['uphno'];
    $city=$_POST['ucity'];
    $gen=$row[5];
  
    $qry = "update user set unm='$nm' ,pw='$pw',email='$em',phno='$phno',gen='$gen',city='$city' where id=$id";
   
    
    if (mysqli_query($cn, $qry)){

       
        header('location:showUser.php');
    
    }
}
require_once("head.php");
?>
<div style="margin: 30px;overflow:auto">
    <div style="margin: 30px; ">
        <h2 class="card-title text-center">Users Data</h2>

        <div class="table-responsive text-center">
            <form action="" method="post">
                <table class="table ">

                    <tbody>

                        <tr>
                            <td class="ts">User Name : </td>
                            <td> <input type="text" id="firstName" class="form-control form-control-lg" name="unm" value="<?php echo $row[1];?>"/></td>
                        </tr>
                        <tr>
                            <td class="ts">Phone no. : </td>
                            <td><input type="password" id="pw" name="upw" class="form-control form-control-lg" value="<?php echo $row[2];?>"/></td>
                        </tr>
                        <tr>
                            <td class="ts">Products : </td>
                            <td><input type="text" id="emailAddress" class="form-control form-control-lg" name="uem" value="<?php echo $row[3];?>"/></td>
                        </tr>
                        <tr>
                            <td class="ts">Quantity : </td>
                            <td> <input type="tel" id="phoneNumber" class="form-control form-control-lg" name="uphno" value="<?php echo $row[4];?>"/></td>
                        </tr>
                        <tr>
                            <td class="ts">Address : </td>
                            <td> <input type="tel" id="phoneNumber" class="form-control form-control-lg" name="uphno" value="<?php echo $row[4];?>"/>
                            <textarea cols=10 ></textarea>
                        </td>
                        </tr>
                        <tr>
                            <td class="ts">Gender : </td>
                            <td style="text-align:start">
                              <?php 
                                    foreach($ar1 as $a){
                                        if($row[5]==$a)
                                        {
                                            ?>
                                                <input type="radio"  value="<?php echo $a?>" checked/>&nbsp;&nbsp;<?php echo $a?>&nbsp;&nbsp;
                                            <?php
                                        }else{
                                        ?>
                                          <input type="radio"  value="<?php echo $a?>" />&nbsp;&nbsp;<?php echo $a?>&nbsp;&nbsp;
                                        <?php
                                    }
                                }
                              ?>

                            </td>
                        </tr>
                        <tr>
                            <td class="ts">City : </td>
                            <td><select class="select form-control form-control-lg" name="ucity">
                                    
                                    <option disabled>--select city--</option>
                                   <?php 
                                        foreach($ar2 as $a)
                                        {
                                            if($$row[6]==$a){
                                            ?>
                                            <option value="<?php echo $a?>" selected><?php echo $a?></option>
                                            <?php 
                                            }else { ?>
                                             <option value="<?php echo $a?>" ><?php echo $a?></option>
                                            <?php
                                        }
                                    }
                                   ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td colspan="2"><button class="btnnn" name="s1" type="submit">Edit</button> </td>
                        </tr>
                    </tbody>


                </table>
            </form>
        </div>
    </div>
</div>

<?php
require_once("foot.php")

?>