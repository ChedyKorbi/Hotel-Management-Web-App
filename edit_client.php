<?php
include 'connexion.php'; 
include 'Client.php'; 

if (isset($_GET['CIN'])) {
    $CIN = $_GET['CIN'];

    $clientObj = new Client($cnx);

    $client = $clientObj->getByCIN($cnx,$CIN);

    if ($client) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Nom = $_POST['Nom'];
            $Prenom = $_POST['Prenom'];
            $address = $_POST['address'];

            $clientObj->update($CIN, $Nom, $Prenom, $address);

            header("Location: client_info.php");
            exit;
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Client</title>
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
            max-width: 500px;
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            color: #343a40;
        }
        .btn {
            border-radius: 5px;
            padding: 10px 20px;
            width: 100%;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
            border: none;
            color: #fff;
        }
        .btn-primary {
            background-color: #17a2b8;
        }
        .btn-primary:hover {
            background-color: #138496;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4 text-center">Edit Client Information</h2>
        <form method="post">
            <div class="form-group">
                <label for="Nom">Nom:</label>
                <input type="text" class="form-control" name="Nom" value="<?php echo $client['Nom']; ?>">
            </div>
            <div class="form-group">
                <label for="Prenom">Prenom:</label>
                <input type="text" class="form-control" name="Prenom" value="<?php echo $client['Prenom']; ?>">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" name="address" value="<?php echo $client['address']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="client_info.php" class="btn btn-secondary">Back to Client Info</a>
    </div>
</body>
</html>

<?php
    } else {
        echo "Client not found.";
    }
} else {
    echo "CIN not set in URL.";
}
?>
