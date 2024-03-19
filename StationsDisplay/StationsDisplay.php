<?php
require('../Database/connection.php');
require('../Database/functions.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charging Stations</title>
    <link rel="stylesheet" href="StationDisplay.css">
    <link rel="stylesheet" href="../index.css">
    

</head>

<body>
    <main class="table">
        <section class="table_header">
            <h1> CHARGING STATIONS </h1>
            <ul class="nav_ul flex">
            <li><a href="../Homepage/Homepage.php" class="logout-button" style="color:#000">HOMEPAGE</a></li>
        </section>
        <section class="table_body">
            <table>
                <thead>
                    <tr>
                        <th> Id </th>
                        <th> Name </th>
                        <th> Address </th>
                        <th> Phone </th>
                        <th> Connector Type </th>
                        <th> Payment Method </th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    $connection->select_db($database);

                    $query = "SELECT * FROM  `stations`";

                    $result = mysqli_query($connection, $query);

                    if (mysqli_num_rows($result) < 1) {

                        echo "YOU DONT HAVE STATIONS IN THE DATABASE";
                    } else {

                        while ($row = mysqli_fetch_assoc($result)) {


                            echo "
                            
                            <tr>
                            <td> {$row['station_id']} </td>
                            <td>  {$row['station_name']} </td>
                            <td>  {$row['address_name']} </td>
                            <td>  {$row['phone_number']}</td>
                            <td>
                                <p>{$row['connector_type']}</p>
                            </td>
                            <td> {$row['payment_method']}</td>
                            </tr>
                            
                            
                            ";
                        }
                    }


                    ?>




                    <!-- <tr>
                        <td> 1 </td>
                        <td> Waterfront EVchanja </td>
                        <td> Waterfront Mall </td>
                        <td> 071272737</td>
                        <td>
                            <p>Level 1</p>
                        </td>
                        <td> Mpesa,cards </td>
                    </tr> -->
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>