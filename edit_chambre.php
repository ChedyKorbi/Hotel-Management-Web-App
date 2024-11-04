<?php
include 'connexion.php'; 
include 'Chambre.php'; 

if (isset($_GET['numch'])) {
    $numch = $_GET['numch'];

    $chambreObj = new Chambre($cnx);

    $room = $chambreObj->getByNumch($cnx, $numch);

    if ($room) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $type = $_POST['type'];
            $prix = $_POST['prix'];

            $chambreObj->update($numch, $type, $prix);

            header("Location: listes_chambre.php");
            exit;
        }

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Room</title>
            <!-- Bootstrap CSS -->
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            <!-- Custom CSS -->
            <style>
                body {
                    background-color: #f8f9fa;
                    padding-top: 50px;
                }
                .container {
                    max-width: 500px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h2 class="mb-4">Edit Room Information</h2>
                <form method="post">
                    <input type="hidden" name="numch" value="<?php echo $room['numch']; ?>">
                    <div class="form-group">
                        <label for="type">Type:</label>
                        <input type="text" class="form-control" name="type" value="<?php echo $room['type']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="prix">Price:</label>
                        <input type="text" class="form-control" name="prix" value="<?php echo $room['Prix']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                <!-- Link to room list page -->
                <a href="listes_chambre.php" class="btn btn-secondary mt-3">Back to Room List</a>
            </div>
        </body>
        </html>
        <?php
    } else {
        // Room not found
        echo "Room not found.";
    }
} else {
    // numch not set in URL
    echo "Room number not set in URL.";
}
?>
