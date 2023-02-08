<?php

//VARIABLES
$message = '';
$number_of_char = $_POST['char_number'] ?? null;
$uppercase_charters = get_array_of_argument('A', 'Z');
$lowercase_charters = get_array_of_argument('a', 'z');
$numbers = get_array_of_argument('0', '9');
$symbols = ['!', '?', '&', '%', '$', '£'];


if (!$number_of_char) {
    $message = 'Insert length of password tra 1 e 15';
} else {
    $all_charters = array_merge($uppercase_charters, $lowercase_charters, $numbers, $symbols);
    $message = get_random_string_to_array($number_of_char, $all_charters);
}

//FUNCTIONS

//Generate an array to a start and end value
function get_array_of_argument($start, $end)
{
    $function_array = [];
    foreach (range($start, $end) as $element) {
        $function_array[] = $element;
    }
    return $function_array;
}

function get_random_string_to_array($length, $array)
{
    $random_password = '';
    $random_char = '';
    $random_element = '';
    for ($i = 0; $i < $length; $i++) {
        $random_element = rand(1, (count($array) - 1));
        $random_char = $array[$random_element];
        $random_password .= $random_char;
    }

    return  $random_password;
};


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
            <h1>Strong Password Generator</h1>
            <!-- MESSAGE BOARD -->
            <div class="alert bg-info-subtle my-3 d-flex align-items-center justify-content-center fw-bold"><?= $message ?></div>
            <!--  INFORMATION FORM -->
            <form action="" method="POST" class="bg-secondary text-white p-5 ">
                <div class="mb-3">
                    <label for="characters_num" class="form-label">Number of characters</label>
                    <input type="number" class="form-control w-50" id="characters_num" min="1" max="15" name="char_number">
                </div>
                <div class="my-5 text-center">
                    <button class="btn btn-primary">Cerca</button>
                    <a href="index.php" class="btn btn-danger">Annulla</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>