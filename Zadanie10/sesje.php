<!doctype html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <title>Strona 1</title>
            <link rel="stylesheet" type="text/css" href="forms.css" />
        </head>
        <body>
            <header>
                <h1>Start sesji</h1> 
            </header>

            <section id="lewy">
               <a href="strona2.php">Przejdź do drugiej strony</a>
               
                <?php
                    session_start();
                    $_SESSION['temp'] = "Hello World";
                ?>

             
            </section>

           
        </body>
    </html>