<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $station_name = $_POST["station_name"];
    $address_name = $_POST["address_name"];
    $phone_number = $_POST["phone_number"];
    $connector_type = $_POST["connector_type"];
    $payment_method = $_POST["payment_method"];

    $errors = array();

    if (is_numeric($station_name)) {
        echo "<script>alert('Station name should not be numbers only')</script>";
    }
 
    if (!ctype_digit($phone_number) || strlen($phone_number) != 10) {
        echo "<script>alert('Phone number should only be numbers with a maximum length of 10.')</script>";
        
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        exit; 
    }

    require('../Database/connection.php');
    require('../Database/functions.php');

    $connection->select_db($database);

    $query = "CREATE TABLE IF NOT EXISTS `stations`(
        station_id int primary key not null auto_increment,
        station_name varchar(78) not null,
        address_name varchar(78) not null,
        phone_number varchar(15) not null,
        connector_type varchar(56) not null,
        payment_method varchar(67) not null
    );";

    if (!$connection->query($query)) echo "There was a problem creating the table";

    $stmt_sent_data = $connection->prepare('INSERT INTO `stations`(station_name,address_name,phone_number,connector_type,payment_method) VALUES(?,?,?,?,?)');

    $stmt_sent_data->bind_param('sssss', $station_name, $address_name, $phone_number, $connector_type, $payment_method);

    if (!$stmt_sent_data->execute()) echo "The data was not sent properly";

    echo "<script type='text/javascript'>alert('Data sent properly')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddStation</title>
    <link rel="stylesheet" type="text/css" href="AddStation.css">
    <link rel="stylesheet" href="../index.css">
</head>

<body>
    <div class="addstation">
        <h1>Add Station</h1>
        <form action="./AddStation.php" method="POST">
            <label>Name of Station</label>
            <input type="text" name="station_name" value="<?php if (isset($_POST['submit'])) {
                                                                echo $station_name;
                                                            } else echo ""; ?>" required>
            <label>Address</label>
            <input type="text" name="address_name" value="<?php if (isset($_POST['submit'])) {
                                                                echo $address_name;
                                                            } else echo ""; ?>" required>
            <label>Phone number</label>
            <input type="number" name="phone_number" value="<?php if (isset($_POST['submit'])) {
                                                                echo $phone_number;
                                                            } else echo ""; ?>" required>
            <label>Connector Type</label>
            <input type="text" name="connector_type" value="<?php if (isset($_POST['submit'])) {
                                                                echo $connector_type;
                                                            } else echo ""; ?>" required>
            
            <label>Payment Method</label>
            <input type="text" name="payment_method" value="<?php if (isset($_POST['submit'])) {
                                                                echo $payment_method;
                                                            } else echo ""; ?>" required>
            <input type="submit" name="submit" value="SUBMIT">
        </form>
        <p>Back to homepage? <a href="../Homepage/Homepage.php">Back</a>
        <P>
    </div>
</body>

</html>


<!--Connector Type</label>
            <input type="text" name="connector_type"   value="" required>