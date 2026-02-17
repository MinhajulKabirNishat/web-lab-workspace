<?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'uiuweb_final';
    $port = 3306;
    $conn = new mysqli($server,$user,$password,$dbname, $port);

    //task 1
    $sql1 = "Select LetterGrade, Count(StudentID) as StudentCount
            From student_final
            group by LetterGrade;";
    
    $res = $conn->query($sql1);

    while( $row = $res->fetch_assoc()){
        echo "$row[LetterGrade] $row[StudentCount] <br>";
        // echo $row['LetterGrade']. $row['Count(StudentID)'] ."<br>";
    }

    //task 3
    $sql3 = "UPDATE student_final 
            SET grade = grade+5
            WHERE grade>80 AND (grade+5) <=90;";
    $conn->query($sql3);

    //task 4
    $sql4 = "Select CourseTitle, Count(StudentID) as StudentCount
            From student_final
            group by CourseTitle
            order by StudentCount desc;";
    
    $res = $conn->query($sql4);
    while( $row = $res->fetch_assoc()){
        echo "$row[CourseTitle] $row[StudentCount] <br>";
    }
?>