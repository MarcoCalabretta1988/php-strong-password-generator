<?php

if (isset($_POST['return'])) {
    session_destroy();
    header('Location: index.php');
}

session_start();
$password = $_SESSION['password'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Password</title>
    <!-- IMPORT BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- IMPORT STYLE -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container h-100 d-flex align-items-center justify-content-center p-5">
        <div class="content-box text-center  d-flex  flex-column align-items-center justify-content-center">
            <div class=" d-flex align-items-center justify-content-center">
                <h1 class="mx-4">La tua password é:</h1>
                <h3><?= $password ?> </h3>
            </div>
            <form action="" method="POST" class="p-3">
                <button class="btn btn-success" name="return">Riprova</button>
            </form>
        </div>
    </div>
</body>

</html>