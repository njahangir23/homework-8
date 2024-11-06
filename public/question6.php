<?php
 try {
    $number = -21; 

    if ($number <= 0) {
        throw new Exception("The number needs to be positive");
    }
    echo "The number is positive: " . $number;

} catch (Exception $e) {
    echo "Caught error";
}