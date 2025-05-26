<?php

session_start();
$access = $_SESSION['access'] ?? 1;
include 'data.php';

// USUWANIE UŻYTKOWNIKA I POWIĄZANYCH PRODUKTÓW
if (isset($_POST['delete_user'])) {
    $user_id = $_POST['user_id'];

    // Pobierz produkty tego użytkownika
    $stmt = $conn->prepare("SELECT id_produkt FROM produkty_usera WHERE id_user = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $produkty_ids = [];
    while ($row = $result->fetch_assoc()) {
        $produkty_ids[] = $row['id_produkt'];
    }
    $stmt->close();

    // Usuń powiązania użytkownika
    $stmt = $conn->prepare("DELETE FROM produkty_usera WHERE id_user = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->close();

    // Usuń użytkownika
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->close();

    // Usuń produkty jeśli nie są powiązane z innymi użytkownikami
    foreach ($produkty_ids as $produkt_id) {
        $stmt = $conn->prepare("SELECT COUNT(*) FROM produkty_usera WHERE id_produkt = ?");
        $stmt->bind_param("i", $produkt_id);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        if ($count == 0) {
            $stmt = $conn->prepare("DELETE FROM produkty WHERE id = ?");
            $stmt->bind_param("i", $produkt_id);
            $stmt->execute();
            $stmt->close();
        }
    }

    echo "<p>Użytkownik i jego produkty zostali usunięci.</p>";
}

// USUWANIE POJEDYNCZEGO PRODUKTU
if (isset($_POST['delete_product'])) {
    $produkt_id = $_POST['produkt_id'];

    // Usuń powiązanie
    $stmt = $conn->prepare("DELETE FROM produkty_usera WHERE id_produkt = ?");
    $stmt->bind_param("i", $produkt_id);
    $stmt->execute();
    $stmt->close();

    // Sprawdź czy produkt jest powiązany z kimś innym
    $stmt = $conn->prepare("SELECT COUNT(*) FROM produkty_usera WHERE id_produkt = ?");
    $stmt->bind_param("i", $produkt_id);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count == 0) {
        $stmt = $conn->prepare("DELETE FROM produkty WHERE id = ?");
        $stmt->bind_param("i", $produkt_id);
        $stmt->execute();
        $stmt->close();
    }

    echo "<p>Produkt został usunięty.</p>";
}
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
            <div class="produkt">
                <form method="post">
                    <label for="produkt_id">Wybierz produkt do usunięcia:</label>
                    <select name="produkt_id" id="produkt_id">
                        <?php
                        $conn = mysqli_connect($servername, $username, $password, $dbname);




                        $zap = "SELECT * FROM produkty"; // Zastosowanie prepared statement

                        $stmt = mysqli_prepare($conn, $zap);

                        mysqli_stmt_execute($stmt);

                        $result = mysqli_stmt_get_result($stmt);


                        ?>
                    <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['nazwa']) . '</option>';
                        }
                        mysqli_stmt_close($stmt);
                        mysqli_close($conn);


                        ?>
                    </select>
                    <button type="submit" name="delete_product_global">Usuń produkt</button>
                    <?php

                    if (isset($_POST['delete_product_global'])) {
                        $produkt_id = $_POST['produkt_id'];
                        $conn = mysqli_connect($servername, $username, $password, $dbname);
                        // Usuń powiązania (jeśli jakieś są)
                        $stmt = $conn->prepare("DELETE FROM produkty_usera WHERE id_produkt = ?");
                        $stmt->bind_param("i", $produkt_id);
                        $stmt->execute();
                        $stmt->close();

                        // Usuń produkt
                        $stmt = $conn->prepare("DELETE FROM produkty WHERE id = ?");
                        $stmt->bind_param("i", $produkt_id);
                        $stmt->execute();
                        $stmt->close();

                        echo "<p>Produkt został usunięty.</p>";
                    }
                    ?>
                </form>
            </div>


            <div class="user">
                <form method="post">
                    <label for="user_id">Wybierz użytkownika do usunięcia:</label>
                    <select name="user_id" id="user_id">
                        <?php
                        $conn = mysqli_connect($servername, $username, $password, $dbname);




                        $zap = "SELECT * FROM users where cat='2'"; // Zastosowanie prepared statement

                        $stmt = mysqli_prepare($conn, $zap);

                        mysqli_stmt_execute($stmt);

                        $result = mysqli_stmt_get_result($stmt);


                        ?>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['nazwa']) . '</option>';
                        }
                        mysqli_stmt_close($stmt);
                        mysqli_close($conn);


                        ?>
                    </select>
                    <button type="submit" name="delete_user_global">Usuń użytkownika</button>

                    <?php
                    if (isset($_POST['delete_user_global'])) {
                        $user_id = $_POST['user_id'];
                        $conn = mysqli_connect($servername, $username, $password, $dbname);
                        // Pobierz produkty tego użytkownika
                        $stmt = $conn->prepare("SELECT id_produkt FROM produkty_usera WHERE id_user = ?");
                        $stmt->bind_param("i", $user_id);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        $produkty_ids = [];
                        while ($row = $result->fetch_assoc()) {
                            $produkty_ids[] = $row['id_produkt'];
                        }
                        $stmt->close();

                        // Usuń powiązania
                        $stmt = $conn->prepare("DELETE FROM produkty_usera WHERE id_user = ?");
                        $stmt->bind_param("i", $user_id);
                        $stmt->execute();
                        $stmt->close();

                        // Usuń użytkownika
                        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
                        $stmt->bind_param("i", $user_id);
                        $stmt->execute();
                        $stmt->close();

                        // Usuń produkty niepowiązane z nikim innym
                        foreach ($produkty_ids as $produkt_id) {
                            $stmt = $conn->prepare("SELECT COUNT(*) FROM produkty_usera WHERE id_produkt = ?");
                            $stmt->bind_param("i", $produkt_id);
                            $stmt->execute();
                            $stmt->bind_result($count);
                            $stmt->fetch();
                            $stmt->close();

                            if ($count == 0) {
                                $stmt = $conn->prepare("DELETE FROM produkty WHERE id = ?");
                                $stmt->bind_param("i", $produkt_id);
                                $stmt->execute();
                                $stmt->close();
                            }
                        }

                        echo "<p>Użytkownik oraz jego produkty zostały usunięte.</p>";
                    }
                    ?>
                </form>
            </div>


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