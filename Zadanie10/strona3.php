<!doctype html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <title>Strona 3</title>
            <link rel="stylesheet" type="text/css" href="forms.css" />
        </head>
        <body>
            <header>
                <h1>Wynik 3:</h1> 
            </header>

            <section id="lewy">
            
            <a href="strona2.php">Wróć do drugiej strony</a>
                
                <?php
                 session_start();
                 
                 echo $_SESSION['temp'];

                 session_destroy();
                ?>

             
            </section>

           
        </body>
    </html>