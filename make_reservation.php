<?php
include 'connexion.php';
include 'Client.php';
include 'Reservation.php';

$showSuccessMessage = false;

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $room_number = $_GET['room_number'] ?? '';
    $room_type = $_GET['room_type'] ?? '';
    $start_date = $_GET['start_date'] ?? '';
    $end_date = $_GET['end_date'] ?? '';
    $CIN = $_GET['CIN'] ?? '';

    $clientObj = new Client($cnx);
    $client = $clientObj->getByCIN($cnx, $CIN);

    if (!$client) {
        echo "Client not found.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CIN = $_POST['CIN'] ?? '';
    $room_number = $_POST['room_number'] ?? '';
    $start_date = $_POST['start_date'] ?? '';
    $end_date = $_POST['end_date'] ?? '';

    $reservation = new Reservation($cnx);
    $reservation->create($start_date, $end_date, $CIN, $room_number);

    $showSuccessMessage = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Reservation</title>
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
            max-width: 600px;
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
        .form-control[disabled], .form-control[readonly] {
            background-color: #e9ecef;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .form-section {
            margin-bottom: 20px;
        }
        .form-section h4 {
            margin-bottom: 10px;
            color: #555;
        }
        .form-section p {
            margin-bottom: 0;
        }
        .success-message {
            display: <?php echo $showSuccessMessage ? 'block' : 'none'; ?>;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($showSuccessMessage): ?>
            <div class="success-message">
                <h2 class="text-center">Reservation Successful</h2>
                <p class="text-center">Your reservation has been successfully created!</p>
                <div class="text-center">
                    <a href="home.html" class="btn btn-primary">Back to Home</a>
                </div>
            </div>
        <?php else: ?>
            <h2>Make Reservation</h2>
            <form action="make_reservation.php" method="post" id="reservationForm">
                <!-- Step 1: Client Information -->
                <div class="form-section">
                    <h4>Client Information</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="CIN" value="<?php echo $client['CIN']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" value="<?php echo $client['Nom'] . ' ' . $client['Prenom']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Address" value="<?php echo $client['address']; ?>" disabled>
                    </div>
                    <input type="hidden" name="CIN" value="<?php echo $client['CIN']; ?>">
                </div>

                <!-- Step 2: Reservation Details -->
                <div class="form-section">
                    <h4>Reservation Details</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Room Type" value="<?php echo $room_type; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Room Number" value="<?php echo $room_number; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Start Date" value="<?php echo $start_date; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="End Date" value="<?php echo $end_date; ?>" disabled>
                    </div>
                    <input type="hidden" name="room_number" value="<?php echo $room_number; ?>">
                    <input type="hidden" name="start_date" value="<?php echo $start_date; ?>">
                    <input type="hidden" name="end_date" value="<?php echo $end_date; ?>">
                </div>

                <!-- Step 3: Confirm Reservation -->
                <div class="form-section">
                    <h4>Confirm Reservation</h4>
                    <p>Review the information and confirm your reservation.</p>
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="bi bi-check"></i> Confirm Reservation
                    </button>
                </div>
            </form>
        <?php endif; ?>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
