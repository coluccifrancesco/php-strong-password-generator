<?php

// Function that generates a password
function passwordGenerator($pwLength, $pwGotUpperCase, $pwGotNumbers, $pwGotSpecial): string {

    // The password can include: uppercases, numbers and special characters
    // but it MUST include lowercases

    // Sets a default length if none is specified
    if($pwLength == 0) {
        $pwLength = 8;
    }

    // Initialises an array that stores the final password
    $pw = [];

    // Defines a variable (pool) containing characters available for the final password
    $haveToBeThere = 'q a z w s x e d c r f v t g b y h n u j m i k o l p';

    // Initialises varaibles that stores the user-selected options (optionals)
    $optionals = [
        $uppercase = '',
        $numbers = '',
        $special = '',
    ];

    // Counts the number of additional character categories requested
    $optionalsToCount = 0;

    // Stores the user's requested password length
    $userLengthRequest = $pwLength;

    // Defines the minimum number of characters to add for every selected optional category
    $minLength = 1;

    // Checks which optional categories have been selected by the user.
    // If an optional category is active, 
    // it populates the corresponding variable with appropriate values,
    // adds them to the final pool, 
    // and increments the counter of selected categories
    
    if ($pwGotUpperCase == 'on') {
        $optionals[0] = 'P L O I K M U J N Y H B T G V R F C E D X W S Z W A Q';
        $haveToBeThere .= $optionals[0];
        $optionalsToCount += $minLength;
    }

    if ($pwGotNumbers == 'on') {
        $optionals[1] = '0 1 9 2 8 3 7 4 6 5';
        $haveToBeThere .= $optionals[1];
        $optionalsToCount += $minLength;
    }

    if ($pwGotSpecial == 'on') {
        $optionals[2] = '! ? $ & @ #';
        $haveToBeThere .= $optionals[2];
        $optionalsToCount += $minLength;
    }

    // Calculates how many characters remain to reach the requested password length
    // by subtracting the number of requested optionals 
    $spareCharacters = $userLengthRequest - $optionalsToCount;

    // Iterates through each optional category
    foreach ($optionals as $optional) {

        // Verifies that the element is not empty
        if ($optional != '') {

            // Converts the string of characters into an array
            $optionalArr = explode(' ', $optional);

            // Calculates the array length
            $optionalLength = count($optionalArr);

            // Selects a random element from the array
            $randomIndex = random_int(0, $optionalLength - 1);

            // Adds the selected character to the final password array
            $pw[] = $optionalArr[$randomIndex];
        }
    }

    // Converts the final pool of characters into an array
    $finalPool = explode(' ', $haveToBeThere);

    // Calculates the length of the final pool
    $finalPoolLength = count($finalPool);

    // Fills the password with the remaining characters, 
    // until the user's requested length is reached
    for ($i = 1; $i <= $spareCharacters; $i++) {

        // Selects a random element from the final pool
        $randomIndex = random_int(0, $finalPoolLength - 1);

        // Adds the selected character to the password array
        $pw[] = $finalPool[$randomIndex];
    }

    // Applies the Fisher-Yates shuffle algorithm to ensure randomness
    for ($i = 0; $i < $userLengthRequest - 1; $i++) {

        // Defines an integer $j with a random value between 0 and the requested password length
        $j = random_int(0, $pwLength - 1);

        // Temporarily stores the value at position $i
        $tmp = $pw[$i];

        // Exchanges the value at position $i with the one at the random position
        $pw[$i] = $pw[$j];

        // Restores the original value at the random position
        $pw[$j] = $tmp;
    }

    // Returns the password as a single concatenated string
    return implode('', $pw);
}

?>
