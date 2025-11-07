<?php 

// Avvio sessione
session_start();

// Importo la funzione
require './functions.php';

                  
// Get password length parameter
$userChosenLength = $_GET['pwLength'] ?? null;
        
// string $userChosenLength to number if != from null
if($userChosenLength != null){
    
    $pwLength = intval($userChosenLength);
}

// Get all the other parameters
$pwGotUpperCase = $_GET['upper'] ?? '';
$pwGotNumbers = $_GET['num'] ?? '';
$pwGotSpecial = $_GET['special'] ?? '';

// If the user chose the pw length and it's in a certain range
if (isset($userChosenLength) && $pwLength >= 8 && $pwLength <= 24) {

    // $pw = function result
    $pw = passwordGenerator( $pwLength, $pwGotUpperCase, $pwGotNumbers, $pwGotSpecial );
    
    // $pw is shared as a global variable
    $_SESSION['pwd'] = $pw;

    // redirecting the user to the result page
    header('Location: ./result.php');

    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cherry+Bomb+One&family=Edu+TAS+Beginner:wght@400..700&family=Fugaz+One&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Jost:ital,wght@0,100..900;1,100..900&family=Lexend+Deca:wght@100..900&family=Lexend:wght@100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Racing+Sans+One&family=Roboto:ital,wght@0,100..900;1,100..900&family=Sometype+Mono:ital,wght@0,400..700;1,400..700&family=Space+Grotesk:wght@300..700&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&family=Tektur:wght@400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Best New Password</title>
</head>

<body class="bg-body">
    <header class="m-5">
        <h1 class="text-center">Have you ever felt really safe?</h1>
        <h3 class="text-center">If no, you should try our passwords...</h3>
    </header>

    <main>
        <section class="mx-5">
            <div class="form-container mx-auto">
                    
                <!-- Form for password customization  -->
                <form action="" method="GET" class="px-5 py-3">
                        
                    <div class="my-4">
                        <div>
                            <div class="my-4 d-flex justify-content-between align-items-center">
                                <label class="label" for="length">Length (8 to 24):</label>

                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <input type="number" value="8" name="pwLength" id="length" min="8" max="24" class="ms-3 ps-3">

                                    <div class="new-spinners gap-2 d-flex flex-column align-items-center justify-content-around">
                                        <button id="plusOne"><i class="fa-solid fa-arrow-up"></i></button>
                                        <button id="minusOne"><i class="fa-solid fa-arrow-down"></i></button>
                                    </div>
                                </div>
                            </div>
                            
                            <label for="uppercases" class="label label-toggle my-4 px-3 py-2 d-flex justify-content-between align-items-center">
                                <span>Uppercase</span>
                                <input type="checkbox" name="upper" id="uppercases" class="ms-3">
                            </label>
                            
                            <label for="numbers" class="label label-toggle my-4 px-3 py-2 d-flex justify-content-between align-items-center">
                                <span>Numbers</span>
                                <input type="checkbox" name="num" id="numbers" class="ms-3">
                            </label>
                            
                            <label for="characters" class="label label-toggle my-4 px-3 py-2 d-flex justify-content-between align-items-center">
                                <span>Special characters</span>
                                <input type="checkbox" name="special" id="characters" class="ms-3">
                            </label>
                        </div>
                        
                        <div class="d-flex justify-content-center align-items-center mt-5">
                            <button type="submit" class="submit-btn px-4 py-2">Generate password</button>
                        </div>
                    </div>     
                    
                </form>
                
            </div>
        
        </section>
    </main>   

    <script>
        
        // pw length logic for functioning buttons instead of webkit spinners
        const pwLengthInput = document.getElementById('length');
                
        const pwLengthPlusOneBtn = document.getElementById('plusOne');
        const pwLengthMinusOneBtn = document.getElementById('minusOne');
        const max = parseInt(pwLengthInput.max);
        const min = parseInt(pwLengthInput.min);
            
        function incrementPwLength() {
                
            event.preventDefault();
            let currentValue = parseInt(pwLengthInput.value);
                
            if(currentValue < max){
                return pwLengthInput.value = currentValue + 1
            } 
        }

        function decrementPwLength() {

            event.preventDefault();
            let currentValue = parseInt(pwLengthInput.value);

            if(currentValue > min){
                return pwLengthInput.value = currentValue - 1
            }
        }

        pwLengthPlusOneBtn.addEventListener('click', incrementPwLength);
        pwLengthMinusOneBtn.addEventListener('click', decrementPwLength);

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>