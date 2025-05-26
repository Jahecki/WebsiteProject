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
            <div class="basic">
                <div class="foto">
                    <img src="img/elements/budowlaniec.jpg" alt="budowlaniec">
                </div>

                <div class="tekscik">
                    <h1>Inzynieria</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum corporis expedita esse dolorem ex temporibus laborum. Nam molestias ullam odit, libero consectetur consequuntur dolores fugit commodi, quo numquam iste animi?
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque quod nam fugit. Ipsa unde, doloribus voluptates cumque dolore itaque sapiente similique aliquid saepe iusto aperiam, ipsam ullam aliquam esse nihil!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt vel accusamus perspiciatis, totam non porro alias, consequuntur veniam error sunt repellendus? Culpa, recusandae? A ut obcaecati sequi minima reiciendis! Reprehenderit.
                    </p>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio explicabo facilis aperiam, adipisci a dolorum dignissimos maiores minus similique quaerat temporibus, facere illum vero ullam rem quos consequuntur esse autem!</p>
                

                <div class="btn-men">
                    <a href="#">Zamów</a>

                </div>
                </div>
            </div>

            <div class="inne">
                <?php
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                if (!$conn) {
                    die("Błąd połączenia: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM produkty"; // <- nazwa Twojej tabeli to 'produkty'
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="card" id="' . $row['id'] . '">
            <div class="card-img">
                <img src="' . htmlspecialchars($row['img']) . '" alt="">
            </div>
            <div class="card-info">
                <p class="text-title">' . htmlspecialchars($row['nazwa']) . '</p>
                <p class="text-body">' . htmlspecialchars($row['opis']) . '</p>
            </div>
            <div class="card-footer">
                <span class="text-title">' . $row['cena'] . ' zł</span>
                <div class="card-button">
                    <svg class="svg-icon" viewBox="0 0 20 20">
                        <path d="M17.72,5.011H8.026c-0.271,0-0.49,0.219-0.49,0.489c0,0.271,0.219,0.489,0.49,0.489h8.962l-1.979,4.773H6.763L4.935,5.343C4.926,5.316,4.897,5.309,4.884,5.286c-0.011-0.024,0-0.051-0.017-0.074C4.833,5.166,4.025,4.081,2.33,3.908C2.068,3.883,1.822,4.075,1.795,4.344C1.767,4.612,1.962,4.853,2.231,4.88c1.143,0.118,1.703,0.738,1.808,0.866l1.91,5.661c0.066,0.199,0.252,0.333,0.463,0.333h8.924c0.116,0,0.22-0.053,0.308-0.128c0.027-0.023,0.042-0.048,0.063-0.076c0.026-0.034,0.063-0.058,0.08-0.099l2.384-5.75c0.062-0.151,0.046-0.323-0.045-0.458C18.036,5.092,17.883,5.011,17.72,5.011z"></path>
                        <path d="M8.251,12.386c-1.023,0-1.856,0.834-1.856,1.856s0.833,1.853,1.856,1.853c1.021,0,1.853-0.83,1.853-1.853S9.273,12.386,8.251,12.386z M8.251,15.116c-0.484,0-0.877-0.393-0.877-0.874c0-0.484,0.394-0.878,0.877-0.878c0.482,0,0.875,0.394,0.875,0.878C9.126,14.724,8.733,15.116,8.251,15.116z"></path>
                        <path d="M13.972,12.386c-1.022,0-1.855,0.834-1.855,1.856s0.833,1.853,1.855,1.853s1.854-0.83,1.854-1.853S14.994,12.386,13.972,12.386z M13.972,15.116c-0.484,0-0.878-0.393-0.878-0.874c0-0.484,0.394-0.878,0.878-0.878c0.482,0,0.875,0.394,0.875,0.878C14.847,14.724,14.454,15.116,13.972,15.116z"></path>
                    </svg>
                </div>
            </div>
          </div>';
                }

                mysqli_close($conn);
                ?>

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