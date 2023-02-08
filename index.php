<?php

//INCLUDE
include 'includes/functions.php';
include 'includes/data/data.php';

//VARIABLES
$message = '';
$error = false;
$repeat = $_POST['repeat'] ?? true;
$number_of_char = $_POST['char_number'] ?? null;



//CONTROL AND SET MESSAGE
if (!$number_of_char) {
    $message = 'Insert length of password tra 1 e 15';
} elseif ($number_of_char > 15 || $number_of_char < 1) {
    $message = 'WARNING! You must insert a number between 1 and 15';
    $error = true;
    $number_of_char = null;
} else {
    $all_characters = array_merge($uppercase_characters, $lowercase_characters, $numbers, $symbols);
    session_start();
    if ($repeat) {
        $_SESSION['password'] = get_random_string_to_array($number_of_char, $all_characters);
    } else {
        $_SESSION['password'] = get_norepeatchar_string_to_array($number_of_char, $all_characters);
    }
    header('Location: ./result.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<!-- HEAD -->
<?php include 'includes/head.php' ?>

<body>
    <div class="container h-100 d-flex align-items-center justify-content-center p-5">
        <div class="content-box p-5">
            <!-- TITLE -->
            <h1 class="text-center p-2">Strong Password Generator</h1>
            <!-- MESSAGE BOARD -->
            <div class="alert <?= $error ? 'error bg-danger' : 'bg-info-subtle' ?>  my-3 d-flex align-items-center justify-content-center fw-bold"><?= $message ?></div>
            <!--  INFORMATION FORM -->
            <form action="" method="POST" class="bg-secondary text-white p-5 ">
                <!-- NUMBER INPUT -->
                <div class="mb-3">
                    <label for="characters_num" class="form-label">Number of characters: </label>
                    <input type="number" class="form-control w-25" id="characters_num" name="char_number" value="<?= $number_of_char ?>">
                </div>
                <!-- RADIO INPUT -->
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="repeat" id="repeat" value="repeat" <? if ($repeat) echo 'checked' ?>>
                    <label class="form-check-label" for="repeat">Characters repeat</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="repeat" id="no-repeat" value="" <? if (!$repeat) echo 'checked' ?>>
                    <label class="form-check-label" for="no-repeat">Characters no repeat</label>
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