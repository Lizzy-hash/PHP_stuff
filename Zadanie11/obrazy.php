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

                $height = 360;
                $width = 360;
                $obraz = imagecreatetruecolor($height, $width);
                $R = 255;
                $G = 0;
                $B = 0;
                $kolor = imagecolorallocate($obraz,$R,$G,$B);
                //imagefilledrectangle($obraz, 0, 0, 360,360, $kolor);
                

                for($i = 0; $i < $height; $i++){
        
                    $kolor = genRainbow($obraz,$i,539);
        
                    for($j = 0; $j < $width; $j++){
                                imageline($obraz, 0, $i, $width,$i, $kolor);
                     
                    }

                }  
                
                ob_clean();
                header('Content-type:image/png');
                imagepng($obraz);

                
             

                ?>

             
            </section>

           
        </body>
    </html>