<?php

session_start();

// taking the $pw as a global variable
$pw = $_SESSION['pwd'];

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
    <title>Safe Password Generator</title>
</head>

<body class="bg-body">
    
    <main>

        <section class="mt-5 pt-5 flex-column d-flex align-items-center justify-content-center gap-4">
            
            <div class="form-container p-5">
                <h1>Your password:</h1>

                <!-- Showing the pw -->
                <div class="mt-3 p-3 pw-container">
                    <h2 class="mb-0" id="generatedPassword"><?php echo $pw; ?></h2>
                </div>
            </div>
            
            <form class="d-flex justify-content-between align-items-center gap-4" action="" method="GET">
                    
                <!-- Back home btn -->
                <input value="Generate again" name="newPw" type="submit"></input>
    
                <!-- Copy to clipboard btn -->
                <button id="copy-pw-button"><i class="fa-regular fa-copy"></i></button>
                    
                <?php 
                
                $newPw = $_GET['newPw'];
    
                if($newPw != ''){
                    header('Location: ./index.php');
                }

                ?>
            
            </form>
        
        </section>
        
        <div id="alertDiv" class="d-flex justify-content-center align-items-center"></div>
    
    </main>

    <script>
        
        const copyPwBtn = document.getElementById('copy-pw-button')
        
        // Function to copy the generated pw
        function copyToClipboard(event){
            
            event.preventDefault();
            
            // Get the alert div
            const alertDiv = document.getElementById('alertDiv');

            // Get the string
            const generatedPassword = document.getElementById('generatedPassword').textContent;
            
            // Copies the string
            navigator.clipboard.writeText(generatedPassword);
            
            // Password is copied
            console.log('Password copied!');
            
            // Show the alert after 1ms
            setTimeout(()=>{
            
                // Populate the html
                alertDiv.innerHTML ='<h3 id="alertText" class="mt-5 mb-0 py-3 px-4 mx-auto text-center">Password copied<i class="fa-regular fa-copy ms-4"></i></h3>';
            
                // Get alert text
                const alertText = document.getElementById('alertText');
            
                // Add class 'hide' to the alertText after 1s
                setTimeout(()=>{
                    
                    alertText.classList.add('hide');
                
                }, 1000);
            
            }, 1);
            
            // Remove the html after 5s
            setTimeout(()=>{alertDiv.innerHTML = ''}, 5000);    
        }
        
        copyPwBtn.addEventListener('click', copyToClipboard);
    
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>