<?php

session_start();

$pw = '';

if (!empty($_SESSION['pwd'])) {

    $pw = $_SESSION['pwd'];
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
    <title>Secure Password</title>
</head>

<body class="bg-body">
    
    <main>
        <section class="mt-5 pt-5 flex-column d-flex align-items-center justify-content-center gap-4">
            <div class="form-container p-5">
                <h1>Your password:</h1>
                <h3 class="mt-3"><?php echo $pw; ?></h3>
            </div>
            
            <form class="w-50" action="" method="GET">
        
                <input value="Generate again" name="newPw" type="submit" class="w-100"></input>

                <?php 
            
                $newPw = $_GET['newPw'];

                if($newPw != ''){
                    header('Location: ./index.php');
                }
                
                ?>
            
        </form>
        </section>
        
    </main>
    
    <footer class="py-5">
        <div class="py-5">.</div>
        <div class="py-5">.</div>
        <div class="py-5">.</div>
        <div class="py-5">.</div>
        <div class="py-5">.</div>
        <div class="py-5">.</div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>