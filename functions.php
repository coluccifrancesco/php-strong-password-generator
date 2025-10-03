<?php

// Funzione per generare la password
function passwordGenerator($pwLength, $pwGotUpperCase, $pwGotNumbers, $pwGotSpecial): string {

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
    foreach ($optionals as $optional) {

        // Se l'elemento non è vuoto (e quindi è stato scelto)
        if ($optional != '') {

            //* Rendo la STRINGA dell'elemento UN nuovo ARRAY
            $optionalArr = explode(' ', $optional);

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
    return implode('', $pw);
}

?>