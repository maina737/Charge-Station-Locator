<?php
//reads the variables sent via POST from AT gateway
$sessionId = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text = $_POST["text"];

if ($text == "") {
    //first request> we start the response with con
    $response = "CON What would you want to check \n";
    $response .= "1. My account No \n";
    $response .= "2. My phone Number \n";

} else if ($text == "1"){
    //logic for first level response
    $response = "CON Choose account information you want to view \n";
    $response .= "1. Account number \n";
    $response .= "2. Account Balance \n";

} else if($text == "2") {
    //logic for first level response but we end 
    $response = " END Your phone number is" .$phoneNumber;
} else if ($text == "1*1") {
    // second level response where user selected 1 in the first instance
    $accountNumber = "ACC1001";

    //this is a terminal request we start with END
    $response = "END Your account Number is " .$accountNumber;

} else if ($text == "1*2") {
    //second level request where user selected 1 in the first instance
    $balance = "KES 10,000";

    //terminal request starts with END
    $response = "END Your balance is " .$balance;

}
//echo the response to the API which depends on the statement that is fulfilled in each instance
header('Content-type: text/plain');
echo $response;

?>