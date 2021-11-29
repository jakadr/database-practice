<?php
include_once 'dla3config.php';
//check btnsave clicked
if(isset($_POST['btnSave'])){
    //read input and assign to var
    $itemName = $_POST['itemName'];
    $unitCost = $_POST['unitCost'];
    //insert sql statement
    $sql="INSERT INTO Item(ItemName,UnitCost) VALUES('$itemName','$unitCost')";
    //execute sql
    $conn->query($sql);
    //display confirmation
    echo "<script> alert('New Item Added')</script>";

}

?>
<!DOCTYPE html>

<html>
<head>
        <title>Add Data</title>
        <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h1>ADD NEW ITEM</h1>
    <form method='post'>
        <table border='1'>
            <tr>
                <td>Item Name</td>
                <td><input type='type' name='itemName' required/></td>
                
            </tr>
            <tr>
                <td>Unit Cost</td>
                <td><input type='number' name='unitCost' required/></td>
                
            </tr>
            <tr>
                <td> <a href='dla3.php'>Go Back</a>
               <td><input type='submit' name='btnSave' value="Add Item"/></td>
               
            </tr>
        </table>
    </form>
    </div>

</body>
</html>