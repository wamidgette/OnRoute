<?php
//=====hotel feature requirements=====//
use OnRoute\models\Database;
use OnRoute\models\Hotel;

require_once './vendor/autoload.php';//doesen't work
require_once 'library/functions.php';
require_once './models/Hotel.php';
require_once './models/Database.php';//if autoload is working, we don't seem to need this

//Add unqiue css files here
$css = array('styles/accommodations.css');
require_once('views/header.php');

//test database conneciton
$dbcon = Database::getDB();

//get method
$h = new Hotel();   
//=====hotel feature requirements=====//

$city = ""; 
$checkin = "";
$checkout = "";
$hotel_id = "";
$hotelroom_id = "";
if(isset($_POST['reserveNow'])){
        $city = $_POST['city'];
        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];
        $hotel_id = $_POST['hotel_id'];
        $hotelroom_id= $_POST['hotelroom_id'];
        $hotelname = $_POST['hotelname'];
        $guestnumber = $_POST['guestnumber'];
        $hoteladdress = $_POST['hoteladdress'];
        $country = $_POST['country'];

        $b = $h->bookHotel($city, $checkin, $checkout, $hotel_id, $hotelroom_id, $dbcon);
    if ($b==true){ 
        echo "<h2>Booking confirmation</h2>";
        echo "<h3>Thank you for booking " . $hotelname . ". Here's the details of your stay: " .
        "<p>
        Hotel name: " . $hotelname ."<br>
        Address: " . $hoteladdress . "<br>
        Check in: " . $checkin . "<br>
        Check out: " . $checkout . "<br>
        Guest number: " . $guestnumber . "<br>
        Please contact our customer service if any of the information is not correct. Have a nice stay!
        </p>";
    } else {
         echo "<h3>error booking</h3>";
    }
}
?>