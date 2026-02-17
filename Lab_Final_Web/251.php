<?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'lab9';
    $port = 3306;

    //If you created the database and table already using 
    //phpMyAdmin then simply run this
    $conn = new mysqli($server,$user,$password,$dbname);


    //If you need to create the database & table via PHP
    // $conn = new mysqli($server,$user,$password);

    // $database_create = 'CREATE DATABASE uiutech_final;';
    // $conn->query($database_create);
    // $conn->select_db($dbname);

    // $conn->query('CREATE TABLE employee_final ( EmployeeID int PRIMARY KEY, EmployeeName varchar(20), DepartmentID int, DepartmentName varchar(20), Salary int, PerformanceRating varchar(1) ); ');
    
    //task 1
    $sql = 'Select * from employee_final';
    $res = $conn->query($sql);
    $a = 0; $b = 0; $c = 0;
    while($row = $res->fetch_assoc()){
       
        if($row['PerformanceRating'] == 'A'){
            $a++;
        }
        else if($row['PerformanceRating'] == 'B'){
            $b++;
        }
        else if($row['PerformanceRating'] == 'C'){
            $c++;
        }
    }

    echo "A: $a B $b C: $c <br>";

    //To solve it using SQL only
    // $countRating = 'Select count(EmployeeID) from employee_final
    //                 group by PerformanceRating';
    // $res1 = $conn->query($countRating);


    //Task 2
    $sql2 = "UPDATE employee_final SET PerformanceRating = 'C'
            where Salary < 40000 AND PerformanceRating != 'D'";
    $conn->query($sql2);

    //solve it using php
    // $res = $conn->query($sql);
    // while($row = $res->fetch_assoc()){
    //     if($row['Salary'] < 40000 && $row['PerformanceRating'] != 'D'){
    //         $sqlUpdate = "UPDATE employee_final SET PerformanceRating = 'C'
    //                         WHERE EmployeeId = $row[EmployeeID]";
    //         $conn->query($sqlUpdate);
    //     }
    // }

    //Task 3
    $res = $conn->query($sql);
    while($row = $res->fetch_assoc()){
        if($row['Salary']>50000 && ($row['Salary'] + 5000) <= 60000){
            $sqlUpdateSalary = "UPDATE employee_final SET Salary = Salary+5000
                            WHERE EmployeeId = $row[EmployeeID]";
            $conn->query($sqlUpdateSalary);
            echo "Salary changed for Employee $row[EmployeeName] <br>";
        }
    }

    //Task 4
    $sqlDeptCount = 'SELECT DepartmentName, COUNT(EmployeeID)
                    FROM employee_final
                    GROUP BY DepartmentName
                    ORDER By COUNT(EmployeeID) desc;';
    $conn->query($sqlDeptCount);

?>