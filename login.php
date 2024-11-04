<?php
include 'connexion.php';
include 'Client.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Admin login authentication
    if (isset($_POST['admin_username']) && isset($_POST['admin_password'])) {
        $admin_username = $_POST['admin_username'];
        $admin_password = $_POST['admin_password'];

        $admin_username_db = 'admin';
        $admin_password_db = 'admin';

        if ($admin_username === $admin_username_db && $admin_password === $admin_password_db) {
            header("Location: admin.html");
            exit();
        } else {
            $login_error = "Invalid admin credentials.";
        }
    }

    // Client login authentication
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $CIN = $_POST['username'];
        $password = $_POST['password'];

        if ($CIN && $password && $CIN === $password) { 
            $client = Client::getByCIN($cnx, $CIN);

            if ($client) {
                header("Location: home.html");
                exit();
            } else {
                $login_error = "Invalid CIN or password.";
            }
        } else {
            $login_error = "Please enter matching CIN and password.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            height: 100vh;
        }

        .row {
            height: 100%;
        }

        .sidenav, .main {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .sidenav {
            background-image: url('login.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            flex: 4;
            padding: 20px;
        }

        .main {
            background-color: #f8f9fa;
            flex: 8;
            padding: 20px;
        }

        .login-main-text {
            max-width: 300px;
        }

        .login-main-text h2 {
            font-weight: 300;
        }

        .form-container {
            width: 100%;
            max-width: 300px;
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

        .btn-primary, .btn-secondary {
            padding: 0.75rem;
            width: 100%;
            margin-top: 1rem;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .login-link {
            text-align: center;
            margin-top: 1rem;
        }

        .vl {
            border-left: 2px solid #ddd;
            height: 100%;
            position: relative;
            margin: 0 auto;
        }

        .vl-innertext {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media screen and (max-width: 768px) {
            .vl {
                display: none;
            }

            .vl-innertext {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 sidenav">
                <div class="login-main-text">
                    <h2>HOTEL<br> Login Page</h2>
                    <p>Login or register from here to access.</p>
                </div>
            </div>
            <div class="col-md-8 main">
                <div class="form-container">
                    <h3>Client Login</h3>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Enter your CIN" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    <?php echo isset($login_error) ? '<div class="alert alert-danger mt-3" role="alert">' . $login_error . '</div>' : ''; ?>
                    <div class="login-link">
                        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
                    </div>
                </div>
                <div class="col-md-1 d-flex align-items-center justify-content-center position-relative">
                    <div class="vl"></div>
                    <span class="vl-innertext">or</span>
                </div>
                <div class="form-container">
                    <h3>Admin Login</h3>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group">
                            <input type="text" class="form-control" name="admin_username" placeholder="Enter Admin Username" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="admin_password" placeholder="Enter Admin Password" required>
                        </div>
                        <button type="submit" class="btn btn-secondary">Login as Admin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>