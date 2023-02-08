<?php

//INCLUDE
include 'includes/functions.php';
include 'includes/data/data.php';

//VARIABLES
$message = '';
$number_of_char = $_POST['char_number'] ?? null;


//CONTROL AND SET MESSAGE
if (!$number_of_char) {
    $message = 'Insert length of password tra 1 e 15';
} else {
    $all_characters = array_merge($uppercase_characters, $lowercase_characters, $numbers, $symbols);

    $message = get_random_string_to_array($number_of_char, $all_characters);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strong Password Generator</title>

    <!-- IMPORT BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- IMPORT STYLE -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container h-100 d-flex align-items-center justify-content-center p-5">
        <div class="content-box bg-white text-dark p-5">
            <!-- TITLE -->
            <h1 class="text-center p-2">Strong Password Generator</h1>
            <!-- MESSAGE BOARD -->
            <div class="alert bg-info-subtle my-3 d-flex align-items-center justify-content-center fw-bold"><?= $message ?></div>
            <!--  INFORMATION FORM -->
            <form action="" method="POST" class="bg-secondary text-white p-5 ">
                <!-- NUMBER INPUT -->
                <div class="mb-3">
                    <label for="characters_num" class="form-label">Number of characters: </label>
                    <input type="number" class="form-control w-25" id="characters_num" min="1" max="15" name="char_number" value="<?= $number_of_char ?>">
                </div>
                <!-- BUTTON  -->
                <div class="my-5 text-center">
                    <button class="btn btn-primary">Create</button>
                    <a href="index.php" class="btn btn-danger">Reset</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>