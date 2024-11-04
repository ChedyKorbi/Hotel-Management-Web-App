<?php
include 'connexion.php'; 
include 'Client.php';

$stmt = $cnx->query("SELECT * FROM Client");
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Information</title>
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
            <h2>Client Information</h2>
            <table class="table table-bordered table-striped mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>CIN</th>
                        <th>Name</th>
                        <th>First Name</th>
                        <th>Address</th>
                        <th class="text-center">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clients as $client) : ?>
                        <tr>
                            <td><?php echo $client['CIN']; ?></td>
                            <td><?php echo $client['Nom']; ?></td>
                            <td><?php echo $client['Prenom']; ?></td>
                            <td><?php echo $client['address']; ?></td>
                            <td class="text-center">
                                <a href="edit_client.php?CIN=<?php echo $client['CIN']; ?>" class="btn btn-edit mr-2">Edit</a>
                                <a href="delete_client.php?CIN=<?php echo $client['CIN']; ?>" class="btn btn-delete">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
