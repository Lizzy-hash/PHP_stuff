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
                    <div class="container">
                        <h1>Create account</h1>
                        <hr>

                        <label for="email"><b>Login</b></label>
                        <input type="text" placeholder="Enter login" name="login"  required> 
                        <br>
                        <br>
                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw"  required>
                        <br>
                        <br>
                        <label for="psw-repeat"><b>Repeat Password</b></label>
                        <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
                        <hr>
                        <br>
                        <br>
                        <input type="submit" value="Register" name="register">
                    </div>

                    <div class="container signin">
                        <p>Already have an account? <a href="uwierz.php">Sign in</a>.</p>
                    </div>
            </form>
            <br />
        
              
               <?php
                    if(isset($_POST['register'])){

                        $user = $_POST['login'];
                        $pass = $_POST['psw'];
                        $r_pass = $_POST['psw-repeat'];

                        if($pass != $r_pass) {
                            echo "Różne hasła";
                            exit();
                        }

                        $received;

                        $db = new mysqli('localhost', 'root','','logowanie');
                        
                        mysqli_set_charset($db,"utf8");

                        if ($db -> connect_error) {
                            echo "Failed to connect to MySQL: " . $db -> connect_error;
                            exit();
                        } 

                        $sql="INSERT INTO uzytkownicy(login,haslo) VALUES(?,?)";

                        if($wynik = $db->prepare($sql)) { // assuming $mysqli is the connection
                            $wynik->bind_param('ss', $user,$pass);
                            $wynik->execute();
                        } else {
                            $error = $db->error;
                            echo $error; // 1054 Unknown column 'foo' in 'field list'
                        }
                        
                        $count = $db->affected_rows;

                            $db->close();
                        if($count>0){

                            echo "Poprawnie dodano użytkownika <br>";
                            echo "Za chwile zostaniesz przekierowany do strony logowania";
                                for($i=0;$i<2;$i++)
                                {
                                    ob_flush();
                                    flush();
                                    sleep(1);
                                }
                            ob_end_flush();
                            echo "<script> location.href='uwierz.php'; </script>";
                            exit();
                        }
                            else echo "Wystąpił błąd podczas dodawania użytkownika";
                        

                            
                    } 
                        



                    

                ?>

             
            </section>

           
        </body>
    </html>