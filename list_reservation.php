<?php
include 'connexion.php'; 
include 'Reservation.php';

$reservation = new Reservation($cnx);
$reservations = $reservation->getAllReservations();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation List</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #93a5cf, #e4efe9);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
            overflow: hidden;
            display: flex;
            flex-direction: row;
            max-width: 1000px;
            width: 90%;
            transition: box-shadow 0.3s ease;
        }
        .form-container {
            flex: 1;
            padding: 40px;
            border-right: 1px solid #dee2e6;
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #343a40;
        }
        .table {
            margin-bottom: 0;
        }
        .table th, .table td {
            border-top: none;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            vertical-align: middle;
            font-size: 0.9rem;
            color: #343a40;
        }
        .btn {
            border-radius: 5px;
            width: 70px;
            display: inline-block;
            text-align: center;
            margin: 0 2px;
            background-color: #6c757d;
            color: #ffffff;
            border: none;
            padding: 5px 10px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #5a6268;
        }
        .btn-edit {
            background-color: #17a2b8;
        }
        .btn-edit:hover {
            background-color: #138496;
        }
        .btn-delete {
            background-color: #dc3545;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Reservation List</h2>
            <table class="table table-bordered table-striped mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>Reservation ID</th>
                        <th>Client ID</th>
                        <th>Room ID</th>
                        <th>Check-in Date</th>
                        <th>Check-out Date</th>
                        <th class="text-center">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservations as $reservation) : ?>
                        <tr>
                            <td><?php echo $reservation['num_res']; ?></td>
                            <td><?php echo $reservation['CIN']; ?></td>
                            <td><?php echo $reservation['numch']; ?></td>
                            <td><?php echo $reservation['datedebut']; ?></td>
                            <td><?php echo $reservation['datefin']; ?></td>
                            <td class="text-center">
                                <a href="delete_reservation.php?num_res=<?php echo $reservation['num_res']; ?>" class="btn btn-delete">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- Center the Back to Dashboard button -->
            <div class="text-center mt-3">
                <a href="admin.html" class="btn btn-primary">Back </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
