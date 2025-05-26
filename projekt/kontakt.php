<?php
SESSION_START();
include 'data.php';
$access = $_SESSION['access'] ?? 1
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="kontakt.css">
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
            <div class="top">
                <h1>Kontakt</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet et quidem aliquid placeat fugit provident quo error earum excepturi beatae! Commodi placeat aperiam iure eaque esse deleniti debitis in cum.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque qui necessitatibus, vero nemo neque nam, ipsa illo dolores id quaerat sint quos nihil ipsum mollitia facere explicabo distinctio, alias ad?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus in iste, veritatis aperiam libero voluptas asperiores sequi, omnis doloribus magni quisquam enim autem ullam vero maxime fugiat! Porro, consectetur laudantium!
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia, perspiciatis enim. Architecto tempora voluptatem repellendus odio amet quasi blanditiis incidunt earum sunt atque. Quibusdam tempora est, consectetur sapiente ducimus totam!
                </p>
            </div>  
            <div class="middle">
                <div class="left">
                    <img src="img/elements/building.jpg">
                </div>

                <div class="right">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ad ex excepturi cupiditate soluta aliquid et nobis, quasi animi dolores distinctio doloribus est voluptatum. Sit facere laboriosam totam aliquam nobis!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae quasi placeat tempore veniam neque velit pariatur ipsa doloribus. Maiores facere sequi eveniet expedita hic repellat praesentium recusandae corporis blanditiis magnam.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione esse vitae ipsum ipsa mollitia dolores ipsam beatae distinctio nam a! Dolor nam nihil soluta reiciendis architecto eligendi veritatis nisi fugit!
                    </p>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit earum praesentium aspernatur asperiores fugit fuga nobis dolore, laborum harum inventore architecto dolores enim quae, quod exercitationem in quasi accusantium officiis?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, nihil officiis. Debitis quos mollitia modi, ut nesciunt adipisci nisi aperiam dolor impedit eos sunt fugit? Modi autem adipisci quisquam alias.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae exercitationem distinctio amet atque tempore quam, sunt doloribus obcaecati! Expedita nobis ducimus voluptates, veritatis possimus autem tenetur quas! Sunt, iure rerum. </p>
                        
                    <div class="link-container">
                        <a href="#" role="button" class="btn">Link 1</a>
                        <a href="#" role="button" class="btn">Link 2</a>  
                    </div>
                </div>

             </div>

             <div class="bot">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore at maiores saepe. Praesentium assumenda debitis suscipit repellendus sapiente earum illo, doloribus eligendi nesciunt autem possimus facere delectus, inventore ad quod!
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit soluta molestias, nisi quas tempore ullam quia labore neque ipsum deserunt saepe cum commodi ea rerum nulla ut aspernatur maiores mollitia.
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta, magnam velit quibusdam, totam, consequuntur debitis itaque consectetur accusantium earum excepturi corporis dolores sapiente dolore neque. Nobis facere minima molestias minus.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste libero, perspiciatis harum ducimus a recusandae quia accusantium quidem quis possimus perferendis architecto eveniet, voluptate soluta illo saepe qui quod. Sequi?
                </p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus qui iste enim rerum et consequatur minus voluptate eligendi quod cupiditate est quas dignissimos veniam recusandae, modi esse autem non adipisci?
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit, tempora. Minima, nobis. Est ducimus, iusto recusandae amet et consequatur. Ex beatae porro nulla reiciendis similique quas dolore at veniam officiis?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, deleniti, possimus aliquam sit excepturi itaque accusantium neque tempora cumque nesciunt odio obcaecati non perferendis nostrum veniam quia modi perspiciatis animi.
                </p>
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