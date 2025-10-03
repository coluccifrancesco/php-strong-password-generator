<?php 

require './functions.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Best New Passwords</title>
</head>

<body class="text-white bg-dark">
    <header class="mt-5">
        <h1 class="text-center">Have you ever felt really safe?</h1>
        <h3 class="text-center">If no, you should try our passwords...</h3>
    </header>

    <main>
        <section class="container-fluid">
            <div class="mx-5 my-5 row">
                <div class="border rounded bg-primary my-2 col-12 col-lg-6 d-flex justify-content-center align-items-center ">
                    
                    <!-- Form con scelta password  -->
                    <form action="" method="GET" class="d-flex justify-content-between align-items-center p-4 w-100">
                        
                        <div class="d-flex flex-column justify-content-center align-items-start gap-3">
                            
                            <div>
                                <label for="length">Length (8 to 24):</label>
                                <input type="number" name="pwLength" id="length" min="8" max="24" class="ms-3 ps-3">
                            </div>

                            <div>
                                <label for="maiuscole">Uppercase</label>
                                <input type="checkbox" name="upper" id="maiuscole" class="ms-3">
                            </div>

                            <div>
                                <label for="numbers">Numbers</label>
                                <input type="checkbox" name="num" id="numbers" class="ms-3">
                            </div>

                            <div>
                                <label for="characters">Special characters</label>
                                <input type="checkbox" name="special" id="characters" class="ms-3">
                            </div>

                        </div>
                        
                        <button type="submit" class="btn btn-success">Genera Password</button>
                    
                    </form>
                
                </div>
                
                <div class="d-none d-lg-block col-1"></div>
                
                <div class="border rounded bg-primary my-2 col-12 col-lg-5 p-4">
                    
                    <?php 
                    
                    // Recupero il parametro lunghezza password
                    $userChosenLength = $_GET['pwLength'];
                    
                    // Se non è settato, oppure è vuoto, ha la lunghezza minima
                    // if(!isset($userChosenLength) || $userChosenLength == '') {
                    //     $userChosenLength = 8;
                    // }
                    
                    // Associo il valore per la lungh. della password ad una 
                    // nuova variabile e converto in numero
                    $pwLength = intval($userChosenLength);
                    
                    // Recupero gli altri parametri dall'url
                    $pwGotUpperCase = $_GET['upper'] ?? '';
                    $pwGotNumbers = $_GET['num'] ?? '';
                    $pwGotSpecial = $_GET['special'] ?? '';

                    // Debugging
                    // var_dump($pwLength);
                    // echo('<br>');
                    
                    // var_dump($pwGotUpperCase);
                    // echo('<br>');
                    
                    // var_dump($pwGotNumbers);
                    // echo('<br>');
                    
                    // var_dump($pwGotSpecial);
                    

                    if (isset($userChosenLength)) {

                        echo passwordGenerator( $pwLength, $pwGotUpperCase, $pwGotNumbers, $pwGotSpecial );
                    }

                    ?>
                
                </div>
            </div>
        </section>
    </main>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>