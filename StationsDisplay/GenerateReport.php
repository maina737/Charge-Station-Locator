<?php
require('../Database/connection.php');
require('../Database/functions.php');

$connection->select_db($database);

$query = "SELECT * FROM stations";
$result = $connection->query($query);

if (!$result) {
    die("Error fetching data: " . $connection->error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Station Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .print-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .print-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Available Stations Report</h1>
    <table>
        <thead>
            <tr>
                <th>Station Name</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Connector Type</th>
                <th>Payment Method</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['station_name']; ?></td>
                    <td><?php echo $row['address_name']; ?></td>
                    <td><?php echo $row['phone_number']; ?></td>
                    <td><?php echo $row['connector_type']; ?></td>
                    <td><?php echo $row['payment_method']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <button class="print-button" onclick="window.print()">Print Report</button>
</body>

</html>

<?php
// Close the connection
$connection->close();
?>
