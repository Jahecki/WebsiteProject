<?php

session_start();
$access = $_SESSION['access'] ?? 1;
include 'data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="oferta.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
<div id="ban">
    <h1>APLIKACJE WWW - PROJEKT 1</h1>
    <a>... nie nauczysz sie plywac nie wchodzac do wody..<br> Bruce Lee</a>
</div>
<div >

    <div class="topnav">

        <a href="site.php" class="btn-men">Start</a>


        <div id="myLinks">
            <?php
            load($array,$access);
            ?>
        </div>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
</div>

    <div id="main">
        <div id="main">
            <form method="POST" action="zarejestruj.php">
                <label>Nazwa Użytkownika:</label>
                <input type="text" name="nazwa" required><br>

                <label>Hasło:</label>
                <input type="password" name="haslo" required><br>

                <input type="submit" value="Zarejestruj"><br>
                <a href="konto.php">Zaloguj</a>
            </form>
        </div>
        <?php
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
        die("Błąd połączenia: " . mysqli_connect_error());
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $login = $_POST['nazwa'];
        $haslo = $_POST['haslo'];

        // Sprawdź, czy użytkownik już istnieje
        $query = "SELECT * FROM users WHERE nazwa = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->fetch_assoc()) {
        echo "Użytkownik o tej nazwie już istnieje.";
        } else {
        $hashed_password = password_hash($haslo, PASSWORD_DEFAULT);
        $domyslna_rola = 2; // Zmieniono z 1 na 2

        $insert = "INSERT INTO users (nazwa, haslo, cat) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insert);
        $stmt->bind_param("ssi", $login, $hashed_password, $domyslna_rola);

        if ($stmt->execute()) {
        echo "Rejestracja zakończona sukcesem!";
        } else {
        echo "Błąd podczas rejestracji: " . $stmt->error;
        }
        }
        }
        ?>
    </div>

    <div id="footer">
        <div class="container">
            <div class="left">

                <h1>Panstwowa Akademia Nauk Stosowanych<br> im.ks.Bronislawa Markiewicza</h1>
                <p>37-200 Jaroslaw</p>
            </div>

            <div class="middle">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2563.892450057149!2d22.67332808264994!3d50.01337101036407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473c9bd00702269d%3A0x34c3e02f77a47069!2sPa%C5%84stwowa%20Akademia%20Nauk%20Stosowanych!5e0!3m2!1spl!2spl!4v1742312681078!5m2!1spl!2spl" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>

            <div class="right">
                <a href="#"><img src="img/icons/blip.png"></a>
                <a href="#"><img src="img/icons/fb.png"></a>
                <a href="#"><img src="img/icons/pint.png"></a>
                <a href="#"><img src="img/icons/skype.png"></a>
                <a href="#"><img src="img/icons/twit.png"></a>
                <a href="#"><img src="img/icons/what.png"></a>
                <a href="#"><img src="img/icons/yt.png"></a>
                <a href="#"><img src="img/icons/link.png"> </a>

            </div>
        </div>
        <script>
            function myFunction() {
                var x = document.getElementById("myLinks");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>
</body>


</html>
