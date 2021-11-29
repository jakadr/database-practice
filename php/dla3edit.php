<?php
    include_once 'dla3config.php';
    if(isset($_GET['itemNo'])) {
        $sql= "SELECT * FROM ITEM WHERE itemNo={$_GET['itemNo']}";
        // execute query
        $result = $conn->query($sql);
        if($result->num_rows >0){
            // assign values to variable
            $row = $result->fetch_assoc();
        }
        else{
            // display error message
            die("Something went wrong.");
        }   
    }
    //check whether click btnUpdate
    if(isset($_POST['btnUpdate'])){
        //get changed input
        $itemName = $_POST['ItemName'];
        $unitCost = $_POST['UnitCost'];
        //sql statement
        $sql=" UPDATE ITEM SET 
        ItemName='$itemName',
        UnitCost=$unitCost 
        WHERE ItemNo={$_GET['itemNo']};";
        //execute sql 
        $conn ->query($sql);
        echo "<script>alert('Item Updated');document.location='dla3.php';</script>";
    
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit  Item</title>
        <link rel="stylesheet" href="style.css">
    <head>
    <body>
        <div class="container">
        <h1>Edit Item</h1>
     
     <form method ="POST">
         <table border="1">
             <tr>
                 <td>Item Name</td>
                 <td><input type="text" name="ItemName" value ="<?php echo  $row ['ItemName'];?>" required/></td>

             </tr>
             <tr>
                 <td>Unit Cost</td>
                 <td><input type="text" name="UnitCost" value ="<?php echo  $row ['UnitCost'];?>" required/></td>

             </tr>
             <tr>
                 <td colspan="2"><button type="submit" name="btnUpdate">UPDATE ME</td>
            </tr>   
            <tr> 
                <td colspan='2'><a href='dla3.php'>CANCEL</a>

            </tr>
         </table>
</form>
        </div>

</body>
</html>
