<?php

//FUNCTIONS

//Generate an array to start and end value
function get_array_of_argument($start, $end)
{
    $function_array = [];
    foreach (range($start, $end) as $element) {
        $function_array[] = $element;
    }
    return $function_array;
}

//Generate random string to array of characters
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
