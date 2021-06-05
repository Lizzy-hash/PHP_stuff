<!doctype html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <title>Strona 1</title>
            <link rel="stylesheet" type="text/css" href="forms.css" />
        </head>
        <body>
            <header>
                <h1>Start sesji</h1> 
            </header>

            <section id="lewy">
               
            <form action="" method="POST">
                <input type="text" placeholder="Username" name="username">
                <input type="password" placeholder="Password" name="psw">
                <input type="submit" name="submit" value="Login">
            </form>

            <br />

            <button><a href = "rejestracja.php" > Załóż konto </a></button>
              
              
               <?php
                session_start();

                    if(isset($_POST['submit'])){

                        $user = $_POST['username'];
                        $pass = $_POST['psw'];
                        

                        $_SESSION['user']= $user;

                        $received;

                        $db = new mysqli('localhost', 'root','','logowanie');
                        
                        mysqli_set_charset($db,"utf8");

                        if ($db -> connect_error) {
                            echo "Failed to connect to MySQL: " . $db -> connect_error;
                            exit();
                        } 

                        $sql="SELECT haslo FROM uzytkownicy WHERE login='$user'";

                        $wynik=$db->prepare($sql);

                        $wynik->execute();

                        $wynik->bind_result($received);

                        while ($wynik->fetch()) {
                            $db->close();
                                if($received == $pass) {
                                    
                                    setcookie("logged","true");
                                    header('Location:wyloguj.php');
                                    exit();
                                }
                                    else echo "Błędne dane logowania";
                        }
                        



                    }

                ?>

             
            </section>

           
        </body>
    </html>