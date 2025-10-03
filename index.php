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
                    if(!isset($userChosenLength) || $userChosenLength == '') {
                        $userChosenLength = 8;
                    }
                    
                    // Associo il valore per la lungh. della password ad una 
                    // nuova variabile e converto in numero
                    $pwLength = intval($userChosenLength);
                    
                    // Recupero gli altri parametri dall'url
                    $pwGotUpperCase = $_GET['upper'] ?? '';
                    $pwGotNumbers = $_GET['num'] ?? '';
                    $pwGotSpecial = $_GET['special'] ?? '';

                    // Debugging
                    var_dump($pwLength);
                    echo('<br>');
                    
                    var_dump($pwGotUpperCase);
                    echo('<br>');
                    
                    var_dump($pwGotNumbers);
                    echo('<br>');
                    
                    var_dump($pwGotSpecial);
                    
                    
                    // Funzione per generare la password
                    function passwordGenerator( $pwLength, $pwGotUpperCase, $pwGotNumbers, $pwGotSpecial ): string {

                        // La password può contenere: MAIUSCOLE, 1234, !?!?
                        // ma DEVE contenere minuscole

                        //  Creo un'array dove inserire i vari elementi della password 
                        $pw = [];   
                        
                        // Creo delle variabili dove inserirò gli elementi da
                        // estrarre per la creazione della password
                        $haveToBeThere = 'q a z w s x e d c r f v t g b y h n u j m i k o l p';
                        
                        // Creo variabili vuote che riempirò in caso di richiesta 
                        // da parte dell'utente
                        $optionals = [
                            $uppercase = '',
                            $numbers = '',
                            $special = '',
                        ];

                        // Variabile per gestire quantità di categorie aggiuntive se presenti
                        $categoryToCount = 0;
                        
                        // Variabile per lunghezza password
                        $userLengthRequest = $pwLength;

                        // Variabile valore minimo di valori di categoria aggiuntiva da inserire
                        $minLength = 1;

                        // Se i valori sono richiesti associo una stringa alla 
                        // variabile con i relativi valori, 
                        // poi li aggiungo alla stringa dei valori obbligatori
                        if ($pwGotUpperCase == 'on') {
                            $optionals[0] = 'P L O I K M U J N Y H B T G V R F C E D X W S Z W A Q';
                            $haveToBeThere .= $optionals[0];
                            $categoryToCount += $minLength;
                        }
                        
                        if ($pwGotNumbers == 'on') {
                            $optionals[1] = '0 1 9 2 8 3 7 4 6 5';
                            $haveToBeThere .= $optionals[1];
                            $categoryToCount += $minLength;
                        }
                        
                        if ($pwGotSpecial == 'on') {
                            $optionals[2] = '! ? $ & @ #';
                            $haveToBeThere .= $optionals[2];
                            $categoryToCount += $minLength;
                        }                     
                    
                        // Variabile per verificare quanti caratteri mancano da inserire: 
                        // lunghezza richeista da utente - categorie richieste
                        $spareCharacters = $userLengthRequest - $categoryToCount;

                        // Per ogni elemento che può essere aggiunto
                        foreach($optionals as $optional){

                            // Se l'elemento non è vuoto (e quindi è stato scelto)
                            if ($optional != ''){
                                
                                //* Rendo la STRINGA dell'elemento UN nuovo ARRAY
                                $optionalArr = explode(' ',$optional);

                                // Verifico la lunghezza dell'array
                                $optionalLength = count($optionalArr);

                                // Scelgo un elemento random dell'array
                                $randomIndex = random_int(0, $optionalLength - 1);

                                // Aggiungo alla password finale
                                $pw[] = $optionalArr[$randomIndex];
                            }
                        }

                        //* Rendo il POOL FINALE UN ARRAY
                        $finalPool = explode(' ', $haveToBeThere);

                        // Trovo la lunghezza del pool finale
                        $finalPoolLenght = count($finalPool);

                        // Per ogni carattere rimanente della password, 
                        // tolti quelli obbligatori (1 per categoria)
                        for ($i = 1; $i <= $spareCharacters; $i++) { 
                        
                            // scelgo un carattere random dal pool finale
                            $randomIndex = random_int(0, $finalPoolLenght - 1);

                            // Aggiungo quel carattere random all'array finale
                            $pw[] = $finalPool[$randomIndex];
                        } 

                        // Randomizzo la password con un algoritmo Fisher Yates
                        for ($i = 0; $i < $userLengthRequest - 1; $i++) { 
                            
                            // Creo un int $j che ha un valore compreso tra
                            // 0 e la lunghezza della password
                            $j = random_int(0, $pwLength - 1);

                            // Salvo l'elemento in posizione $i di $pw
                            $tmp = $pw[$i];

                            // Scambio l'elemento in posizione $i con il nuovo valore
                            $pw[$i] = $pw[$j];

                            // Il promo valore lo inserirsco nella posizione scambiata
                            $pw[$j] = $tmp;
                        }
                        
                        // La funzione ritorna una password randomizzata
                        return implode('',$pw);
                    };
                    ?>
                
                </div>
            </div>
        </section>
    </main>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>