<?php
include 'connexion.php'; 
include 'Chambre.php'; 

$chambre = new Chambre($cnx);

$rooms = $chambre->getAllRooms();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #93a5cf, #e4efe9);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 20px;
        }
        .card {
            width: 300px;
            margin: 15px;
            border: none;
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .card-body {
            padding: 20px;
            text-align: center;
        }
        .card-title {
            font-size: 1.25rem;
            margin-bottom: 10px;
            color: #343a40;
        }
        .card-text {
            margin-bottom: 15px;
            color: #6c757d;
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
    <?php foreach ($rooms as $room) : ?>
        <div class="card">
            <img src="rooom.jpg" alt="Room Image">
            <div class="card-body">
                <h5 class="card-title">Room Number: <?php echo $room['numch']; ?></h5>
                <p class="card-text">Type: <?php echo $room['type']; ?></p>
                <p class="card-text">Price: <?php echo $room['Prix']; ?> TND</p>
                <a href="edit_chambre.php?numch=<?php echo $room['numch']; ?>" class="btn btn-edit">Edit</a>
                <a href="delete_chambre.php?numch=<?php echo $room['numch']; ?>" class="btn btn-delete">Delete</a>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
