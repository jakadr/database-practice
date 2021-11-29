<!DOCTYPE html>
<html>
    <head>
        <title>My Database</title>
    </head>
    <body>
        <h1>My Orders</h1>
        <?php 
            // declare variables and assign values 
            $serverName='localhost';
            $userName='root';
            $password='';
            $dbName='cafe';
        // create connection
        $conn = new mysqli($serverName,$userName,$password,$dbName);
        // check connection
        if($conn->connect_error){
            die("Connection not done: ".$conn->connect_error);}
        // }else{
        //     echo "we have connection to $dbName";
        // }
        // create a sql statment 
        $sql = "SELECT salesorder.OrderNo as OrderNo, salesorder.OrderDate as OrderDate,
        salesorder.CustomerName as CustomerName, item.ItemName as ItemName,
        item.UnitCost as UnitCost, orderline.QuantityOrdered as QuantityOrder, orderline.TotalAmount as Total
        FROM orderline
        INNER JOIN salesorder 
        ON orderline.OrderNo = salesorder.OrderNo
        INNER JOIN item
        ON orderline.ItemNo = item.ItemNo";
        // execute the sql statement assign result
        $result = $conn->query($sql);
        if($result->num_rows>0){
            echo "<table border='1'>
                  <tr>
                    <th>Order Num</th>
                    <th>Order Date</th>
                    <th>Customer</th>
                    <th>Item</th>
                    <th>Unit Cost</th>
                    <th>Quantity</th>
                    <th>Total</th>
                  </tr>";
                  while($row = $result->fetch_assoc()){
                      echo "<tr>
                               <td>{$row['OrderNo']}</td>
                               <td>{$row['OrderDate']}</td>
                               <td>{$row['CustomerName']}</td>
                               <td>{$row['ItemName']}</td>
                               <td>{$row['UnitCost']}</td>
                               <td>{$row['QuantityOrder']}</td>
                               <td>{$row['Total']}</td>
                            </tr>";
                  }
        }
        ?>
    </body>
</html>