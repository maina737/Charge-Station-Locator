<?php
//reads the variables sent via POST from AT gateway
$sessionId = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text = $_POST["text"];

if ($text == "") {
    //first request> we start the response with con
    $response = "CON View Locations According to \n";
    $response .= "1. Connector Type \n";
    $response .= "2. Payment Method \n";

} else if ($text == "1"){
    //logic for first level response
    $response = "CON Choose Connector Type \n";
    $response .= "1. DC Fast Charger \n";
    $response .= "2. Type A \n";

} else if ($text == "1*1") {
    // second level response where user selected 1 in the first instance
    $stationOne = "Sarit Center";
    $stationTwo = "JKIA Charger";
    $stationThree = "Well Charger";
    $stationFour = "ABC Place";

    //this is a terminal request we start with END
    $response = "END Charging Stations are" .$stationOne .$stationTwo .$stationThree .$stationFour ;

} else if ($text == "1*2") {
    //second level request where user selected 1 in the first instance
    $stationOne = "Sarit Center";
    $stationTwo = "JKIA Charger";
    $stationThree = "Well Charger";
    $stationFour = "ABC Place";

    //terminal request starts with END
    $response = "END Charging Stations are" .$stationOne .$stationTwo .$stationThree .$stationFour ;

} else if($text == "2") {
    // logic for first level response but we end 
    $response = "CON View Stations according to Payment method \n";
    $response .= "1. Mpesa \n";
    $response .= "2. Credit Card \n";

} else if ($text == "2*1") {
    // second level response where user selected 1 in the first instance
    $stationOne = "Total Charger";
    $stationTwo = "JKIA Charger";
    $stationThree = "Well Charger";
    $stationFour = "TRM Charger";

    //this is a terminal request we start with END
    $response = "END Charging Stations are" .$stationOne .$stationTwo .$stationThree .$stationFour ;
} else if ($text == "2*2") {
    //second level request where user selected 1 in the first instance
    $stationOne = "Sarit Center";
    $stationTwo = "ABC Place";
    $stationThree = "Well Charger";
    $stationFour = "JKIA Charger";

    //terminal request starts with END
    $response = "END Charging Stations are" .$stationOne .$stationTwo .$stationThree .$stationFour ;

}

//echo the response to the API which depends on the statement that is fulfilled in each instance
header('Content-type: text/plain');
echo $response;

?>