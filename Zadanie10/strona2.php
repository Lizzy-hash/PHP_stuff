<!doctype html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <title>Strona 2</title>
            <link rel="stylesheet" type="text/css" href="forms.css" />
        </head>
        <body>
            <header>
                <h1>Wynik 2:</h1> 
            </header>

            <section id="lewy">
                <a href="strona3.php">Przejdź do trzeciej strony</a><br />
                <a href="sesje.php">Wróć do pierwszej strony</a> <br /> <br />
                
                <?php
                 session_start();

                 echo $_SESSION['temp'];
                 
                 unset($_SESSION['temp']);
                ?>

             
            </section>

           
        </body>
    </html>