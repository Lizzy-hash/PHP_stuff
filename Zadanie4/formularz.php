<!doctype html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <title>Wynik zamówienia</title>
            <link rel="stylesheet" type="text/css" href="styl.css" />
        </head>
        <body>
            <header>
                <h1>Części samochodowe Janka</h1> 
            </header>

            <section id="lewy">
                 <h2>Składanie zamówienia: </h2>

                <form action="formularz.php" method="POST">
                <p>Opony:</p>
                <input type="text" name = "iloscOpon" size="3" maxlength="3"  /> 
                <p>Olej:</p>
                <input type="text" name= "iloscOleju" size="3" maxlength="3"  /> 
                <p>Świece:</p>
                <input type="text" name= "iloscSwiec" size="3" maxlength="3"  /> 
                <p> Podaj dane kontaktowe: </p>
                <p>Imię: </p><input type="text" name= "imie" size="20" maxlength="20"  /> 
                <p>Nazwisko:</p><input type="text" name= "nazwisko" size="20" maxlength="20"  /> 
                <p>Ulica: </p> <input type="text" name= "ulica" size="20" maxlength="20"  /> 
                <p>Nr domu/nr mieszkania: </p> <input type="text" name= "nrdomu" size="8" maxlength="8"  /> 
                <input type="submit" name="submit" value="Wyślij" />
                </form>
<div id="skrypt">
            <?php
             
                     
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

                        $imie = $_POST['imie'];
                        $nazwisko = $_POST['nazwisko'];
                        $ulica = $_POST['ulica'];
                        $dom = $_POST['nrdomu'];

                       
                    }
                   
                
                if(isset($_POST['submit']))
                {

                    
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
                  // echo '<p> '.number_format(($opony*OPONY)+($olej*OLEJ)+($swiece*SWIECE) , 2).' zł </p>'; 
                    echo '<p><i>Dziękujemy za złożenie zamówienia!</i></p>';

                    

                    $XYZ = sprintf("%03d",000);
                    $new_date = date('Y-m-d-h');
                    
                   // @$to_file = fopen($new_date.$XYZ.'.txt', 'xb');

                    for($temp=sprintf("%03d",000); $temp<sprintf("%03d",999); sprintf("%03d",$temp++))
                    {
                        if (!file_exists($new_date.sprintf("%03d",$temp).'.txt')) 
                        {   
                            $XYZ = sprintf("%03d",$temp);
                            sprintf("%03d",$XYZ);
                            $temp = sprintf("%03d",1000);
                        }
                        
                    }

                @$to_file = fopen($new_date.sprintf("%03d",$XYZ).'.txt', 'ab');
                        
                    

                    fwrite($to_file, $imie."\n");
                    fwrite($to_file, $nazwisko."\n");
                    fwrite($to_file, $ulica."\n");
                    fwrite($to_file, $dom."\n");
                    fwrite($to_file, 'Opon: '.$opony."\n");
                    fwrite($to_file, 'Oleju: '.$olej."\n");
                    fwrite($to_file, 'Świec: '.$swiece."\n");

                    fclose($to_file);
              

                   
            }

                ?>
    </div>
            </section>

            <footer>
                <p>utworzone przez: Eliza Mrówczyńska</p>
            </footer>
        </body>
    </html>