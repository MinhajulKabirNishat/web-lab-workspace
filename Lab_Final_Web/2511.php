<?php

$server = "localhost";
$username ="root";
$password ="";
$dbname ="uiutech_final";
$port ="3306";

$conn= new mysqli($server,$username,$password,$dbname,$port);
echo "connection successful";

//task1

$sql1="SELECT PerformanceRating , count(EmployeeID) as emp_count
FROM employee_final
GROUP by PerformanceRating;";

$res= $conn->query($sql1);
while ($row=$res->fetch_assoc()){
    
echo "$row[PerformanceRating] $row[emp_count] <br>";

}

//task2
$sql2="update employee_final 
set PerformanceRating ='C' 
WHERE Salary <40000 AND PerformanceRating!='D'; ";


$conn->query($sql2);

//task3

$sql3="update employee_final
set salary = salary+5000
where Salary>5000 and (Salary+5000)<=60000;";

$conn->query($sql3);

//task4



$sql4="SELECT DepartmentName, COUNT(EmployeeID)as emp_count
from employee_final
group by DepartmentName
ORDER by emp_count DESC;";

$res2= $conn->query($sql4);
while ($row2=$res2->fetch_assoc()){
    
echo "$row2[DepartmentName] $row2[emp_count] <br>";

}

?>