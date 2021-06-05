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
                    <select name="wybor">
                        <option value="tytul" selected>Tytuł</option>
                        <option value="autor">Autor</option>
                        <option value="isbn">ISBN</option>
                    </select>
                    <input type="text" name="dana" />
                    <input type="submit" name="submit" value="Wyślij" /> 

                    Dodaj książkę: <br>
                    <p>Autor:</p><input type="text" name="aut" />
                    <p>Tytuł:</p><input type="text" name="tyt" />
                    <p>ISBN:</p><input type="text" name="isbn" />
                    <p>Cena:</p><input type="text" name="cen" />
                    <input type="submit" name="dodaj" value="Dodaj" /> 
                </form>
                <?php
                 
                 if(isset($_POST['submit']))
                 {
                     $choice = $_POST['wybor'];
                     $szukane = $_POST['dana'];

                     $isbn;
                     $autor;
                     $tytul;
                     $cena;
                     $suma;

                     if(isset($choice)){
                        
                        $dane = $_POST['dana'];

                        if(isset($dane)){

                            @$db = new mysqli('localhost','root','','ksiegarnia');
                            mysqli_set_charset($db,"utf8");

                            if ($db -> connect_error) {
                                echo "Failed to connect to MySQL: " . $db -> connect_error;
                                exit();
                              }


                            switch($choice){
                                case 'isbn':
                                     $sql="SELECT count(*) FROM ksiazki WHERE ISBN='$dane'";
                                     break;
                                case 'autor':
                                    $sql="SELECT count(*) FROM ksiazki WHERE Autor='$dane'";
                                    break;
                                case 'tytul':
                                    $sql="SELECT count(*) FROM ksiazki WHERE Tytul='$dane'";
                                    break;
                            }

                            $wynik=$db->prepare($sql);

                            $wynik->execute();

                            $wynik->bind_result($suma);
                        
                            while ($wynik->fetch()) {
                                echo "Wykryto: ".$suma." wierszy <br>";
                            }
                            

                            switch($choice){
                                case 'isbn':
                                     $sql2="SELECT ISBN, Autor, Tytul, Cena FROM ksiazki WHERE ISBN='$dane'";
                                     break;
                                case 'autor':
                                    $sql2="SELECT ISBN, Autor, Tytul, Cena FROM ksiazki WHERE Autor='$dane'";
                                    break;
                                case 'tytul':
                                    $sql2="SELECT ISBN, Autor, Tytul, Cena FROM ksiazki WHERE Tytul='$dane'";
                                    break;
                            }

                            $wynik2=$db->prepare($sql2);

                            $wynik2->execute();

                            $wynik2->bind_result($isbn, $autor, $tytul, $cena);
                        
                            while ($wynik2->fetch()) {
                                echo "Tytuł: ".$tytul."<br>Autor: ".$autor."<br>ISBN: ".$isbn."<br>Cena: ".$cena;
                            }
                        }
                    }
                    $db->close();
                }
                        
                    if(isset($_POST['dodaj'])){

                                if(isset($_POST['aut']) && isset($_POST['tyt']) && isset($_POST['isbn'])  && isset($_POST['cen'])){
                                    $new_autor = $_POST['aut'];
                                    $new_title = $_POST['tyt'];
                                    $new_isbn = $_POST['isbn'];
                                    $new_price = $_POST['cen'];

                                    @$db = new mysqli('localhost','root','','ksiegarnia');
                                    mysqli_set_charset($db,"utf8");

                                    $zapytanie = "INSERT INTO Ksiazki VALUES (?,?,?,?)";
                                    
                                    $polecenie = $db->prepare($zapytanie);
                                    $polecenie->bind_param('sssd', $new_isbn, $new_autor, $new_title,doubleval($new_price));
                                    $polecenie->execute();
                                   
                                    $count = $db->affected_rows;

                                    if($count>0){
                                        echo "Poprawnie dodano książkę";
                                    }
                                        else echo "Wystąpił błąd podczas dodawania książki";
                                } 
                                
                                $db->close();
                            }
                          
                ?>

             
            </section>

           
        </body>
    </html>