<?php
function venueCost($attendee, $cpp, $capacity){
    $totalVenue =ceil($attendee /$capacity);
    $emptySeats =($totalVenue*$capacity)-$attendee;
    $wastedMoney =($emptySeats*$cpp);


    echo"Total Venue: $totalVenue <br>";
    echo"Empty Seats: $emptySeats <br>";
    echo"Wasted Money: $wastedMoney <br>";

}


if ($_SERVER ['REQUEST_METHOD']=='POST'){
    $attendee =$_POST['attendee'];
    $cpp = $_POST ['cpp'];
    $capacity = $_POST ['capacity'];

    venueCost($attendee,$cpp,$capacity);
}

//venueCost(250,120,80);

?>


<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <form method ="POST" action="#">
        <input type="text" name="attendee" placeholder="Number of Attendees">
        <input type="text" name="cpp" placeholder="Cost Per Person">
        <input type="text" name="capacity" placeholder="Venue Capacity">
        <input type="submit" value="Calculate">
</form>    
</body>
</html>