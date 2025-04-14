<?php
require_once("head.php");
require_once("connection.php");
$qry = "select * from user";
$result = mysqli_query($cn, $qry);
if(isset($_REQUEST['did'])){
    $id= $_REQUEST['did'];
    $qry="delete from purchase user id =". $id;
    mysqli_query($cn, $qry);
    
}
?>
<div style="margin: 30px;">
    <div style="margin: 30px; ">
        <h2 class="card-title text-center">User Data</h2>

        <div class="table-responsive" style="background-color:#f0f0f0">
            <table class="table">
                <thead class="bg-danger text-white">
                    <tr>
                        <?php
                        $row = mysqli_fetch_assoc($result);
                        foreach ($row as $column_name => $value) {
                            echo "<th>$column_name</th>";
                        }
                        ?>
                          <th colspan="2" class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    mysqli_data_seek($result, 0); // Reset the result pointer
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        foreach ($row as $value) {
                            echo "<td>$value</td>";
                        }
                        ?>
                        <td><a href="updateUser.php?did=<?php echo $row['id']?>">Edit</a></td>
                        <td><a href="showUser.php?did=<?php echo $row['id']?>">Delete</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                 </tbody>
                
                  
            </table>
        </div>
    </div>
</div>

<?php
require_once("foot.php")

?>