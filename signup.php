<?php
include 'connexion.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CIN = $_POST['CIN'] ?? '';
    $Nom = $_POST['Nom'] ?? '';
    $Prenom = $_POST['Prenom'] ?? '';
    $address = $_POST['address'] ?? '';

    if ($CIN && $Nom && $Prenom && $address) {

        include 'Client.php'; 
        $client = new Client($cnx); 
        $client->create($CIN, $Nom, $Prenom, $address); 
        header("Location: login.php"); 
        exit;
    } else {
        $signup_error = "Please fill in all required fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: "Lato", sans-serif;
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        .container-fluid {
            height: 100vh; /* Change height to viewport height */
        }

        .row {
            height: 100%; /* Set row height to 100% */
        }

        .sidenav, .main {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .sidenav {
            background-image: url('bckg.jpg'); /* Background image */
            background-size: cover;
            background-position: center;
            color: white;
            flex: 3; /* Adjust width */
            padding: 50px; /* Add padding */
        }

        .main {
            background-color: #f8f9fa;
            flex: 4; /* Adjust width */
            padding: 20px; /* Add padding */
        }

        .login-main-text {
            max-width: 300px;
        }

        .login-main-text h2 {
            font-weight: 300;
        }

        .form-container {
            width: 100%;
            max-width: 400px; /* Wider form */
            padding: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h3 {
            margin-bottom: 1.5rem;
            text-align: center;
            color: #343a40;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-control {
            border-radius: 0.25rem;
            padding: 0.75rem;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 0.75rem;
            width: 100%;
            margin-top: 1rem;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .login-link {
            text-align: center;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 sidenav">
                <div class="login-main-text">
                    <h2>HOTEL <br> Singup Page</h2>
                    <p>Create your hotel account right now!</p>
                </div>
            </div>
            <div class="col-md-8 main">
                <div class="form-container">
                    <h3>Sign Up</h3>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group">
                            <input type="text" class="form-control" name="CIN" placeholder="Enter your CIN" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="Nom" placeholder="Enter your Nom" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="Prenom" placeholder="Enter your Prenom" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="address" placeholder="Enter your Address" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </form>
                    <?php echo isset($signup_error) ? '<div class="alert alert-danger mt-3" role="alert">' . $signup_error . '</div>' : ''; ?>
                    <div class="login-link">
                        <p>Already a client? <a href="login.php">Login now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
