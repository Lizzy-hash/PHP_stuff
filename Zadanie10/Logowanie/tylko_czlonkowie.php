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
           
            <?php
                    session_start();

                   if($_COOKIE["logged"]) echo "Użytkownik zalogowany";
                        else echo "Użytkownik niezalogowany";

                ?>
           
           
            <form action="" method="POST">
                
                <input type="submit" name="wroc" value="Wroc do poprzedniej strony">
            </form>
                
                <?php

                    if(isset($_POST['wroc'])){
                            header('Location:wyloguj.php');
                            exit();
                    }
                ?>

             
            </section>

           
        </body>
    </html>