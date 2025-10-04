<?php 

// Avvio sessione
session_start();

// Importo la funzione
require './functions.php';

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
    <title>Best New Password</title>
</head>

<body class="bg-body">
    <header class="m-5">
        <h1 class="text-center">Have you ever felt really safe?</h1>
        <h3 class="text-center">If no, you should try our passwords...</h3>
    </header>

    <main>
        <section>
            <div class="form-container m-5">
                    
                <!-- Form scelta password  -->
                <form action="" method="GET" class="px-5 py-3 w-100">
                        
                    <div class="my-4">       
                        <div>
                            <div class="my-4 d-flex justify-content-between align-items-center">
                                <label for="length">Length (8 to 24):</label>
                                <input type="number" name="pwLength" id="length" min="8" max="24" class="ms-3 ps-3">
                            </div>
                            
                            <div class="my-4 d-flex justify-content-between align-items-center">
                                <label for="maiuscole">Uppercase</label>
                                <input type="checkbox" name="upper" id="maiuscole" class="ms-3">
                            </div>
                            
                            <div class="my-4 d-flex justify-content-between align-items-center">
                                <label for="numbers">Numbers</label>
                                <input type="checkbox" name="num" id="numbers" class="ms-3">
                            </div>
                            
                            <div class="my-4 d-flex justify-content-between align-items-center">
                                <label for="characters">Special characters</label>
                                <input type="checkbox" name="special" id="characters" class="ms-3">
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-center align-items-center mt-5">
                            <button type="submit" class="submit-btn px-4 py-2">Generate password</button>
                        </div>
                    </div>     
                    
                </form>
                
            </div>
                
                    
            <?php 
                    
            // Recupero il parametro lunghezza password
            $userChosenLength = $_GET['pwLength'];
                    
            // Associo il valore per la lungh. della password ad una 
            // nuova variabile e converto in numero
            $pwLength = intval($userChosenLength);
                    
            // Recupero gli altri parametri dall'url
            $pwGotUpperCase = $_GET['upper'] ?? '';
            $pwGotNumbers = $_GET['num'] ?? '';
            $pwGotSpecial = $_GET['special'] ?? '';

            // Dichiaro la variabile password
            $pw;

            if (isset($userChosenLength)) {

                $pw = passwordGenerator( $pwLength, $pwGotUpperCase, $pwGotNumbers, $pwGotSpecial );
                $_SESSION['pwd'] = $pw;
                header('Location: ./result.php');
            }

            ?>
        
        </section>
    </main>    

    <footer class="py-5">
        <div>.</div>
        <div>.</div>
        <div>.</div>
        <div>.</div>
        <div>.</div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>