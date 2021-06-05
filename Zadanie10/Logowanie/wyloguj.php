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
               
            <form action="" method="POST">
                <?php
                    session_start();

                    echo "Poprawnie zalogowano użytkownika ".$_SESSION['user'];

                ?>
                <input type="submit" name="submit" value="Logout"> <br><br>
                <input type="submit" name="zal" value="Only registered">
            </form>
              
              
               <?php

                    if(isset($_POST['submit'])){
                        unset($_COOKIE['logged']);
                        header('Location:uwierz.php');
                        exit();
                    }

                    if(isset($_POST['zal'])){

                        header('Location:tylko_czlonkowie.php');
                        exit();
                        
                    }

                ?>

             
            </section>

           
        </body>
    </html>