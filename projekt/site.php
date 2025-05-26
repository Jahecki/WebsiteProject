<?php
SESSION_START();
include 'data.php';

$access = $_SESSION['access'] ?? 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    
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

        <div class="srodek">
            <div class="lewo">
                <h1>APLIKACJE WWW - PROJEKT 1</h1>

                <a>... nie nauczysz sie plywac nie wchodzac do wody..<br> Bruce Lee</a>

            </div>

            <div class="prawo">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat, quaerat aliquid? Magni dolorem mollitia fuga nulla adipisci sit iste, officia minima. Quis, eum maxime iste accusamus placeat dolorem blanditiis voluptate.</p>

                <br>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet id voluptatem aspernatur dolorum tempora vero ipsa? Voluptas eligendi corrupti qui tenetur aut architecto, amet quo numquam beatae! Velit, corporis hic?</p>

            </div>
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