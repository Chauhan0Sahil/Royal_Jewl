<?php
require_once("connection.php");
$row=$id="";
if(isset($_REQUEST['did'])){
    $id= $_REQUEST['did'];
    $res = mysqli_query($cn, "SELECT * FROM products where id =$id ");
    $row=mysqli_fetch_row($res);
   
}

if(isset($_POST['s1'])){
   $nm=$_POST['nm'];
   $price=$_POST['price'];
   $qry="update products set nm='$nm' ,price=$price where id=$id";
   if(mysqli_query($cn,$qry)){
   
    header('location: show_products.php');
    
   }
    else{
        echo mysqli_error();
        echo "error";
    }
}

require_once("head.php");
?>
<div style="margin: 30px;">
    <div style="margin: 30px; ">
        <h2 class="card-title text-center">Products Data</h2>

        <div class="table-responsive text-center"  >
            <form action="" method="post">
            <table class="table " >
                
                    <tbody>
                   
                        <tr>
                        <td class="ts">Name : </td>
                        <td ><input type="text" name="nm" class="ts" value="<?php echo $row[1]?>"/></td>
                        </tr>
                        <tr>
                        <td class="ts">Price : </td>
                        <td><input type="number" name="price" class="ts"  value="<?php echo $row[2]?>"/></td>
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