<!doctype html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <title>Wynik zamówienia</title>
            <link rel="stylesheet" type="text/css" href="forms.css" />
        </head>
        <body>
            <header>
                <h1>Komentarze</h1> 
            </header>

            <section id="lewy">
                 <h2>Komentarz do zamówienia </h2>

                 <form action="" method="POST">
                <p>Nazwisko:</p>
                <input type="text" name = "nazw" size="20"  /> <br />
                <p>E-mail:</p>
                <input type="text" name= "email" size="20"  /> <br />
                <p>Komentarz:</p>
                <textarea rows="4" cols="50" name="comment" >Tu wpisz swój komentarz </textarea>
                <br />
                <input type="submit" name="submit" value="Wyślij" />
                </form>
                <?php
                 
                 if(isset($_POST['submit']))
                 {
                 $surn = trim($_POST['nazw']," ");
                 $email = trim($_POST['email']," ");
                 $com = str_replace("\n"," ",$_POST['comment']);

                 $email_to = "eliza.mrowczynska@gmail.com";
                 $topic = "Komentarze ze strony WWW";
                 $theme = "Nazwa klienta: ".$surn."\n Adres pocztowy: ".$email."\n Komentarz: ".$com."\n";
                 $email_from = "eliza.mrowczynska@gmail.com";
                
                    if(stristr($com,"dostaw")) $email_to = "dostawy@przykladowy.pl";
                    if(stristr($com,"sklep")) $email_to = "sprzedaż@przykladowy.pl";
                    if(stristr($com,"rachun") || stristr($com,"parag") || stristr($com,"faktu")) $email_to = "ksiegowosc@przykladowy.pl";

                 echo nl2br(htmlspecialchars($com));

                 echo "<br />"."Wysłano do: ".$email_to;
                 //mail($email_to, $topic, $theme, $email_from);
                }
                ?>

             
            </section>

           
        </body>
    </html>