<?php
require_once("head.php");
require_once("connection.php");
$nm = "";
$price = "";
if(isset($_POST['s1'])){
   $nm=$_POST['nm'];
   $price=$_POST['price'];
   $qry="insert into products (nm,price) values ('$nm',$price)";
   if(mysqli_query($cn,$qry)){
    echo "<script>window.location.href='show_products.php';</script>";
   }

}

?>
<div style="margin: 30px;">
    <div style="margin: 30px; ">
        <!-- <h2 class="card-title text-center">Purchase Data</h2> -->

        <div class="table-responsive text-center"  >
            <form action="" method="post">
            <table class="table " >
                
                    <tbody>
                   
                        <tr>
                        <td class="ts">Name : </td>
                        <td ><input type="text" name="nm" class="ts" value="<?php echo $nm?>"/></td>
                        </tr>
                        <tr>
                        <td class="ts">Price : </td>
                        <td><input type="number" name="price" class="ts"  value="<?php echo $price?>"/></td>
                        </tr>
                        <tr>
                        <!-- <td class="ts">Image : </td>
                        <td><input type="number" name="price" class="ts"  value="<?php echo $price?>"/></td>
                        </tr> -->
                        <tr>
                        <td colspan="2"><button class="btnnn" name="s1" type="submit">Insert</button> </td>
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