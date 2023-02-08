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
<!-- HEAD -->
<?php include 'includes/head.php' ?>

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