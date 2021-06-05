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

            

    
                $db = new mysqli('localhost', 'root','','wybory');
                        
                mysqli_set_charset($db,"utf8");

                if ($db -> connect_error) {
                    echo "Failed to connect to MySQL: " . $db -> connect_error;
                    exit();
                } 
                
               
             
                if(isset($_POST['submit'])){
                    
                   $radio_choice = $_POST['candidate']; 
                   $received;
                   $num;
                   
                   $sql="SELECT liczba_glosow FROM kandydaci WHERE nazwa='$radio_choice'";

                    $wynik=$db->prepare($sql);

                    $wynik->execute();

                    $wynik->bind_result($received);

                    while ($wynik->fetch()) {
                       
                        $received++;
                        
                    }
                   
                    $glosy = array();
                    $nazwisko = array();
                    
                    $sql2 = "UPDATE kandydaci SET liczba_glosow = $received WHERE nazwa='$radio_choice'";

                    $update = $db->prepare($sql2);
                    $update->execute();

                    for($i=0;$i<2;$i++)
                    {
                        ob_flush();
                        flush();
                        sleep(1);
                    }
                ob_end_flush();
                echo "<script> location.href='show_data.php'; </script>";
                exit();     
       
                   
                   
                }

               
             

                ?>

             
            </section>

           
        </body>
    </html>