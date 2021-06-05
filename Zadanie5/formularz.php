<?php
    $doc_root = $_SERVER['DOCUMENT_ROOT'];
?>

<!doctype html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <title>Wynik zamówienia</title>
            <link rel="stylesheet" type="text/css" href="form1.css" />
        </head>
        <body>
            <header>
                <h1>Wyniki zamówienia</h1> 
            </header>

            <section id="lewy">
                 <h2>Zamówienia klientów </h2>

                <?php
                
                    @$wp = fopen("zamowienia/zam1.txt", 'rb');

                    flock($wp, LOCK_EX);

                    if(!$wp)
                        {
                            echo "Brak zamowienia";
                            exit;
                        };


                        $filename = 'zamowienia/zam1.txt';
                   
                        // echo $filename . ': ' . filesize($filename) . ' bytes <br>';
                    
                    while(!feof($wp))
                    {
                       
                        // while (($char = fgetc($wp)) !== false) 
                        // {
                        //     echo nl2br($char);

                        // }
                       
                        // echo "<br>";

                     echo nl2br(fread($wp, filesize($filename)));
                        
                    }

                    flock($wp, LOCK_UN);
                    fclose($wp);


                ?>

            </section>

            <footer>
                <p>utworzone przez: Eliza Mrówczyńska</p>
            </footer>
        </body>
    </html>