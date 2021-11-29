<?php include_once 'dla3config.php' ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>My Database</title>
    </head>
    <body>
        <div class="container">
        <h1>My Orders</h1>
        <?php
        //check item no and delete
        if(isset($_GET['itemNo'])){
            $sql="DELETE FROM ITEM WHERE itemNo={$_GET['itemNo']}";
        //execute sql
        $conn->query($sql);

        }
        // create a sql statment 
        $sql = "SELECT * FROM ITEM";
        // execute the sql statement assign result
        $result = $conn->query($sql);
        if($result->num_rows>0){
            echo "<table border='1'>
                  <tr>
                    <th>Item Num</th>
                    <th>Item Name</th>
                    <th>Unit Cost</th>
                    <th colspan='5'>OPTION</th>
                    
                  </tr>";
                  while($row = $result->fetch_assoc()){
                      echo "<tr>
                               <td>{$row['ItemNo']}</td>
                               <td>{$row['ItemName']}</td>
                               <td>{$row['UnitCost']}</td>
                               <td><a href=dla3edit.php?itemNo='{$row['ItemNo']}'>EDIT</a></td>
                               <td><a href=dla3.php?itemNo='{$row['ItemNo']}'>DELETE</a></td>
                          ";
                          
                  }
                 echo "<tr>
                 <td colspan='5'><a href=dla3add.php>ADD NEW ITEM</a></td>
                ";
                 }
                else{
                    echo "No result";
                 
        }
        ?>
        </div>
      

    </body>
</html>