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
                    $tab = array();

                    for($i=0; $i<21 ; $i++)
                    {
                        array_push($tab ,'Produkt_'.$i.'<br>');
                    }
//ZADANIE 1
                    // foreach($tab as $element){
                    //     echo $element;
                    // }

//ZADANIE 2
                    // $produkty = @array(
                    //                 array("Opony ", 100),
                    //                 array("Oleje ", 10),
                    //                 array("Świece ", 5),
                    //                 array("Wycieraczki ",8),
                    //                 array("Lampy ", 16),
                    //                 array("Pomidory ",22),
                    //                 array("Ogórki ", 40).
                    //                 array("Ziemniaki " , 70),
                    //                 array("Jajka ", 40),
                    //                 array("Jabłka ", 65),
                    //                 array("sth ", 65));

                    //  for($i = 0; $i<10; $i++)
                    //  {
                    //     for($j=0; $j < 2; $j++)
                    //         {
                    //             echo $produkty[$i][$j];
                    //         }
                    //     echo "<br>";

                    //  }         

//ZADANIE 3

                $file = fopen("zam1.txt", 'rb');
                $tab = array();
                $i = 0;

                while(!feof($file))
                {
                     array_push($tab,fgets($file));
                
                }
                   
          

                echo "<table border='1' style='border-collapse: 
                    collapse;border-color: silver;'>";  
                echo "<tr style='font-weight: bold;'>";  
                echo "<td width='150' align='center'>Dane:</td>";  
                echo "</tr>";

                foreach ($tab as $row) 
                { 
                echo '<td width="150" align=center>' . $row . '</td>';
                echo '</tr>';
                    }

                ?>

             
            </section>

           
        </body>
    </html>