<!doctype html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <title>Wynik zamówienia</title>
            <link rel="stylesheet" type="text/css" href="form.css" />
        </head>
        <body>
            <header>
                <h1>Części samochodowe Janka</h1> 
            </header>

            <section id="lewy">
                 <h2>Wynik zamówienia</h2>

                <form action="formularz.php" method="POST">
                <p>Opony:</p>
                <input type="text" name = "iloscOpon" size="3" maxlength="3"  /> <br />
                <p>Olej:</p>
                <input type="text" name= "iloscOleju" size="3" maxlength="3"  /> <br />
                <p>Świece:</p>
                <input type="text" name= "iloscSwiec" size="3" maxlength="3"  /> <br /> <br />
                <input type="submit" name="submit" value="Wyślij" />
                </form>

                <?php
                
                if (isset($_POST['iloscOpon'])) {
                    $opony=$_POST['iloscOpon'];
                }
                
                if (isset($_POST['iloscOleju'])) {
                    $olej=$_POST['iloscOleju'];
                }
                
                if (isset($_POST['iloscSwiec'])) {
                    $swiece=$_POST['iloscSwiec'];
                }
                   
                
                if(isset($_POST['submit']))
                {
                    echo 'Zamówienie złożone o '.date('H:i,jS F Y').'<br />';
                    echo '</p> Zamówionych zostało: </br>'.$opony. ' opon, <br/>'.$olej.' oleju, <br />'.$swiece.' świec. <br />';
                    echo 'Dziękujemy za złożenie zamówienia!';
                }


                ?>

            </section>

            <footer>
                <p>utworzone przez: Eliza Mrówczyńska</p>
            </footer>
        </body>
    </html>