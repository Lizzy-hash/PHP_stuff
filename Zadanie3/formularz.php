<!doctype html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <title>Wynik zamówienia</title>
            <link rel="stylesheet" type="text/css" href="zad3.css" />
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
                <select name="jak">
                    <option value = "internetu" select = "selected"> Z internetu </option>
                    <option value = "tv"> Z telewizji </option>
                    <option value = "znajomi"> Od znajomych lub rodziny </option>
                    <option value = "inne"> Inne </option>
                </select> <br /> <br />
                <input type="submit" name="submit" value="Wyślij" />
                </form>
<div id="skrypt">
            <?php
                echo "<br />";
                echo "<br />";
                echo "<table style = 'border: 1px solid black; position: absolute; top: 350px; left: -480px;'>";
                $odleglosc = 5;
                echo "<tr style = ' background-color: grey;'><td>odległość</td><td>cena</td>";
                    for($i = 0 ; $i<5 ;$i++)
                        {
                            
                            echo "<tr><td style = 'border: 1px solid black;'>".$odleglosc*$i."km </td><td style = 'border: 1px solid black;'>".$i*10;
                            echo "zł </td></tr>";
                        }
    
    
                echo "</table>";

                    define("OPONY",155.5);
                    define("OLEJ", 9.99);
                    define("SWIECE", 1.99);
                
                     
                if (isset($_POST['iloscOpon']) && isset($_POST['iloscOleju']) && isset($_POST['iloscSwiec'])) {
                    $opony=$_POST['iloscOpon'];
                    $olej=$_POST['iloscOleju'];
                    $swiece=$_POST['iloscSwiec'];
                }
                if(empty($_POST['iloscOpon']) && empty($_POST['iloscOleju']) && empty($_POST['iloscSwiec']))
                    {
                        echo "<p>Brak danych </p>";
                        exit();
                    }
                    else {
                        $opony=$_POST['iloscOpon'];
                        $olej=$_POST['iloscOleju'];
                        $swiece=$_POST['iloscSwiec'];
                    }
                   
                
                if(isset($_POST['submit']))
                {
                    echo(gettype($opony));

                   if(empty($opony)) $opony = 0.0;
                   if(empty($swiece)) $swiece = 0.0;
                   if(empty($olej)) $olej = 0.0;

                    echo '<p> Zamówienie złożone o '.date('H:i,jS F Y').'</p>';
                   
                    echo '<p> Zamówionych zostało: <br /></br>'.$opony;
                    if ($opony == 0) echo ' opon </p>';
                    if ($opony == 1) echo ' opona </p>';
                    if ($opony ==2 || $opony == 3 || $opony == 4) echo ' opony </p>';
                    if ($opony > 4) echo ' opon </p>';
                    
                        echo '<p> '.$olej;
                    if ($olej == 0) echo ' olejów ';
                    if ($olej == 1) echo ' olej';
                    if ($olej == 2 || $olej == 3 || $olej == 4) echo ' oleje';  
                     if ($olej > 4) echo ' olejów </p>';
                       
                     echo '<p> '.$swiece;
                    if ($swiece == 0) echo ' świec </p>';
                    if ($swiece == 1) echo ' świeca </p>';
                    if ($swiece == 2 || $swiece == 3 || $swiece == 4) echo ' świece </p>';  
                    if ($swiece > 4) echo ' świec </p>'; 

                    echo '<p><strong> Do zapłaty: </strong></p>';
                    echo '<p> '.number_format(($opony*OPONY)+($olej*OLEJ)+($swiece*SWIECE) , 2).' zł </p>'; 
                    echo '<p><i>Dziękujemy za złożenie zamówienia!</i></p>';

                    if(isset($_POST['jak']))
                    {
                        $wybor = $_POST['jak'];
                            echo "<p> Dowiedziałeś się o naszym sklepie ";
                           
                            switch($wybor)
                                {
                                    case 'internet':
                                                echo " z internetu </p>";
                                                break;
                                    case 'tv':
                                                 echo " z telewizji </p>";
                                                break;
                                    case 'znajomi':
                                                 echo " od znajomych/rodziny </p>";
                                                break;
                                    case 'inne':
                                                echo " z innych źródeł </p>";
                                                 break;
                                }
                    }
                else echo "<p>Nie wybrano opcji. </p>";
                }

                ?>
    </div>
            </section>

            <footer>
                <p>utworzone przez: Eliza Mrówczyńska</p>
            </footer>
        </body>
    </html>