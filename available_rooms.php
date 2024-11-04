<?php
include 'connexion.php';
include 'Reservation.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $room_type = $_GET['room_type'] ?? '';
    $start_date = $_GET['start_date'] ?? '';
    $end_date = $_GET['end_date'] ?? '';
    $CIN = $_GET['CIN'] ?? '';

    $reservation = new Reservation($cnx);

    $availableRooms = $reservation->checkAvailability($start_date, $end_date, $room_type);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Rooms</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: url('login.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }
        .lead {
            text-align: center;
            color: #555;
        }
        .table-responsive {
            margin-top: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Available Rooms</h2>
        <p class="lead">Below are the available rooms for the selected dates and room type:</p>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Room Number</th>
                        <th>Room Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($availableRooms)) : ?>
                        <?php foreach ($availableRooms as $room) : ?>
                            <tr>
                                <td><?php echo $room['numch']; ?></td>
                                <td><?php echo $room['type']; ?></td>
                                <td>
                                    <form action="make_reservation.php" method="get">
                                        <input type="hidden" name="room_number" value="<?php echo $room['numch']; ?>">
                                        <input type="hidden" name="room_type" value="<?php echo $room['type']; ?>">
                                        <input type="hidden" name="start_date" value="<?php echo $start_date; ?>">
                                        <input type="hidden" name="end_date" value="<?php echo $end_date; ?>">
                                        <input type="hidden" name="CIN" value="<?php echo $CIN; ?>">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="bi bi-calendar-check"></i> Reservez maintenant!
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="3" class="text-center">No available rooms found for the selected dates and room type.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
