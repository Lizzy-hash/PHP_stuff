<!doctype html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <title>Kolorki</title>
            <link rel="stylesheet" type="text/css" href="forms.css" />
        </head>
        <body>
            <header>
            </header>

            <section id="lewy">
            

            <h2>Kandydaci na prezydenta RP:</h2>

                <form action="" method = "POST">
                <input type="radio" id="ak" name="candidate" value="Anna Klepacz">
                <label for="Anna Klepacz">Anna Klepacz</label><br>
                <input type="radio" id="jm" name="candidate" value="Jan Mikołaj">
                <label for="Jan Mikołaj">Jan Mikołaj</label><br>
                <input type="radio" id="zn" name="candidate" value="Zegar Naścienny">
                <label for="Zegar Naścienny">Zegar Naścienny</label><br>
                <input type="radio" id="nz" name="candidate" value="Niema Zbyszka">
                <label for="Niema Zbyszka">Niema Zbyszka</label><br>
                <input type="radio" id="ad" name="candidate" value="Andrzej Dupa">
                <label for="Andrzej Dupa">Andrzej Dupa</label><br>

                <input type="submit" name="submit" value="Wyślij">
                </form> 
                
                <?php

            


                function genRainbow($obraz,$height, $max_height){
                    $which_third = floor($height / ($max_height / 3)) ;

                    $height__in_rad;

                    switch($which_third){

                        case 0:
                            $height_in_radians = ($height * pi() / ($max_height / 3)) / 2;

                            return imagecolorallocate($obraz,cos($height_in_radians) * 255 ,sin($height_in_radians) * 255 ,0);
                        case 1:
                            $height -= $max_height / 3;
                            $height_in_radians = ($height * pi() / ($max_height / 3)) / 2;
                            return imagecolorallocate($obraz,0 , cos($height_in_radians) * 255 ,sin($height_in_radians) * 255 );
                
                        case 2:
                            $height -= 2 * $max_height / 3;
                            $height_in_radians = ($height * pi() / ($max_height / 3)) / 2;
                            return imagecolorallocate($obraz, cos($height_in_radians) * 255 , 0, sin($height_in_radians) * 255 );

                
                    }
                
                    return imagecolorallocate($obraz,255 ,0 ,0);
                }

    
                $db = new mysqli('localhost', 'root','','wybory');
                        
                mysqli_set_charset($db,"utf8");

                if ($db -> connect_error) {
                    echo "Failed to connect to MySQL: " . $db -> connect_error;
                    exit();
                } 
                
               
             
                

                $sql3="SELECT liczba_glosow, nazwa FROM kandydaci";

                $wynik2 = $db->prepare($sql3);

                $wynik2->execute();

                for($i = 0; $i < 5 ; $i++) $wynik2->bind_result($glosy[$i], $nazwisko[$i]);

                $from_x = array();
                $from_y = array();
                $to_x = array();
                $to_y = array();

                $y_shift = 600/5;
                $max_gl = 100;

                for($i = 0; $i<5 ;$i++) {
                    $from_y[$i] = $i * $y_shift;
                    $from_x[$i] = 0;
                }

                for($j = 0; $j<5 ;$j++) {
                    $to_y[$i] = $from_y[$j];
                    $to_x[$i] = ($glosy[$j] * 600)/$max_gl;
                }

                $height = 600;
                $width = 600;
                $obraz = imagecreatetruecolor($height, $width);
                $R = 255;
                $G = 0;
                $B = 0;
                $kolor = imagecolorallocate($obraz,$R,$G,$B);


                for($k = 0; $k<5 ; $k++){

                    for($l = 0; $l < 10; $l++){
                    imageline($obraz,$from_x[$k], $from_y[$k] + $l, $to_x[$k], $to_y[$k] + $l, $kolor);
                    }

                    
                }
                
    
                    
                


                $db->close();

                ob_clean();
                header('Content-type:image/png');
                imagepng($obraz);
             

                ?>

             
            </section>

           
        </body>
    </html>