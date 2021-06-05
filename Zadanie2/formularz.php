<!doctype html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <title>Wynik zamówienia</title>
            <link rel="stylesheet" type="text/css" href="zad2.css" />
        </head>
        <body>
            <header>
                <h1>Części samochodowe Janka</h1> 
            </header>

            <section id="lewy">
                 <h2>Składanie zamówienia: </h2>

                <form action="formularz.php" method="POST">
                <p>Opony:</p>
                <input type="text" name = "iloscOpon" size="3" maxlength="3"  /> <br />
                <p>Olej:</p>
                <input type="text" name= "iloscOleju" size="3" maxlength="3"  /> <br />
                <p>Świece:</p>
                <input type="text" name= "iloscSwiec" size="3" maxlength="3"  /> <br /> <br />
                <input type="submit" name="submit" value="Wyślij" />
                </form>
<div id="skrypt">
                <?php
                    
                    define("OPONY",155.5);
                    define("OLEJ", 9.99);
                    define("SWIECE", 1.99);
                
                     
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
                    echo '<p> Zamówienie złożone o '.date('H:i,jS F Y').'</p>';
                   
                    echo '<p> Zamówionych zostało: <br /></br>'.$opony;
                    if ($opony == 1) echo ' opona </p>';
                    if ($opony ==2 || $opony == 3 || $opony == 4) echo ' opony </p>';
                        else echo ' opon </p>';
                    
                        echo '<p> '.$olej;
                    if ($olej == 1) echo ' olej';
                    if ($olej == 2 || $olej == 3 || $olej == 4) echo ' oleje';  
                     if ($olej > 4) echo ' olejów </p>';
                       
                     echo '<p> '.$swiece;
                    if ($swiece == 1) echo ' świeca </p>';
                    if ($swiece == 2 || $swiece == 3 || $swiece == 4) echo ' świece </p>';  
                    if ($swiece > 4) echo ' świec </p>'; 

                    echo '<p><strong> Do zapłaty: </strong></p>';
                    echo '<p> '.number_format(($opony*OPONY)+($olej*OLEJ)+($swiece*SWIECE) , 2).' zł </p>'; 
                    echo '<p><i>Dziękujemy za złożenie zamówienia!</i></p>';
                }

                ?>
     </div>           
            </section>

            <footer>
                <p>utworzone przez: Eliza Mrówczyńska</p>
            </footer>
        </body>
    </html>