<?php
include 'connexion.php'; 
include 'Chambre.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numch = $_POST['numch'] ?? '';
    $type = $_POST['type'] ?? '';
    $prix = $_POST['prix'] ?? '';


    if ($numch && $type && $prix) {
      
        $chambre = new Chambre($cnx);
        $chambre->create($numch, $type, $prix); 
        header("Location: listes_chambre.php"); 
        exit;
    } else {
        $error = "Please fill in all required fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Room</title>
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
            max-width: 600px;
            background-color: #ffffff;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #17a2b8;
            border-radius: 20px 20px 0 0;
            color: #fff;
            text-align: center;
            font-weight: bold;
            padding: 20px;
        }
        .card-body {
            padding: 30px;
        }
        .form-control {
            border-radius: 20px;
            padding: 7px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
        }
        select.form-control {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            padding-right: 38px; /* Add padding for dropdown arrow */
        }
        .btn {
            border-radius: 20px;
            padding: 12px 30px;
            font-weight: bold;
            width: 100%;
            border: none;
            color: #fff;
            transition: background-color 0.3s ease;
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
        <div class="card">
            <div class="card-header">
                <h3>Add a Room</h3>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form-group">
                        <input type="text" class="form-control" name="numch" placeholder="Room Number" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="type" required>
                            <option value="" disabled selected>Room Type</option>
                            <option value="single">Single</option>
                            <option value="double">Double</option>
                            <option value="triple">Triple</option>
                            <option value="suite">Suite</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="prix" placeholder="Room Price" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Room</button>
                    <a href="listes_chambre.php" class="btn btn-secondary mt-3">View Room List</a>
                </form>
                <?php echo isset($error) ? '<div class="alert alert-danger mt-3" role="alert">' . $error . '</div>' : ''; ?>
            </div>
        </div>
    </div>
</body>
</html>
