<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $dbname = "sundarban";
    $port = "3307";

    //create a new connection
    $conn = new mysqli($server, $user, $password, $dbname, $port);
    //Check connection
    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }

    $sql = "Select * from sales_data";
    $result = $conn->query($sql);

    


    if($result->num_rows > 0){
        $elec_rev = 0;
        $furn_rev = 0;
        $acc_rev = 0;
        $e_count = 0;
        $f_count=0;
        $a_count=0;
        //output of each row
        while($row = $result->fetch_assoc()){
            if($row["CategoryName"] == 'Electronics'){
                $elec_rev+=$row["Revenue"];
                $e_count++;
            }
            else if($row["CategoryName"] == 'Furniture'){
                $furn_rev+=$row["Revenue"];
                $f_count++;
            }
            else if($row["CategoryName"] == 'Accessories'){
                $acc_rev+=$row["Revenue"];
                $a_count++;
            }
        }
        echo "Elec rev: $elec_rev Furn: $furn_rev Accessories: $acc_rev";
    }

    //task 2
    $updateLow = "UPDATE sales_data
             SET CategoryName = 'Low Performing'
             WHERE Revenue < 40000";
    $conn->query($updateLow);
    //task 3

    $result = $conn->query($sql);

    // if($result->num_rows > 0){
    //     //output of each row
    //     while($row = $result->fetch_assoc()){
    //         if($row["Revenue"] > 70000){
    //             echo $row["SaleID"];
    //             $sql2 = "UPDATE sales_data SET Revenue = Revenue *1.10 WHERE SaleID = $row[SaleID]";
    //             if($conn->query($sql2)){
    //                 echo "Changed rev<br>";
    //             }
    //         } 
    //     }
    // }
    echo $elec_rev;

    //task 4
    $e_avg = $elec_rev/$e_count;
    $f_avg = $furn_rev/$f_count;
    $a_avg = $acc_rev/$a_count;

    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
            if($row["CategoryName"] == 'Electronics'){
                if($row["Revenue"] > $e_avg){
                    echo "$row[ProductName] $row[CategoryName] Top Seller";
                }
                else{
                    echo "$row[ProductName] $row[CategoryName] Regular Seller";
                }
            }
            else if($row["CategoryName"] == 'Furniture'){
                if($row["Revenue"] > $f_avg){
                    echo "$row[ProductName] $row[CategoryName] Top Seller";
                }
                else{
                    echo "$row[ProductName] $row[CategoryName] Regular Seller";
                }
            }
            else if($row["CategoryName"] == 'Accessories'){
                if($row["Revenue"] > $a_avg){
                    echo "$row[ProductName] $row[CategoryName] Top Seller";
                }
                else{
                    echo "$row[ProductName] $row[CategoryName] Regular Seller";
                }
            }
        }


?>
