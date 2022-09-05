<?php
include "config.php";
if (isset($_GET['accept-cookies'])){
    setcookie('accept-cookies','true', time() + 31556925);
    header('location: ./');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta property="og:title" content="Jacques Offenbach Grand Prix 2021" />
<meta property="og:description" content="Online singing competition with international judges and audience vote." />
<meta property="og:image" content="https://www.offenbachgp.com/" />

    <title>OffenbachGP</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <link rel="stylesheet" href="indexstyle.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
<?php
if(!isset($_COOKIE['accept-cookies'])){
    ?>
    <div class="cookie-banner">
        <div class="container">
            <p>We use cookies on this website.  By using this website, you agree to our cookie policy.  For more information please click  <a href="data.html" target="_blank">here.</a></p> <br> 
            <a href="?accept-cookies" class="button">Accept</a>
        </div>
    </div>
<?php }?>
    <section>
     
        <header>
            <!-- <a href="#" class="logo">Performance<br> opportunities<br> online</a> -->
            
            <div class="sponsor" id="sponsor">
           

            <img src="images/sponsor2.jpg" alt="">
            <img src="images/sponsor3.jpg" alt="">
            <img src="images/sponsor4.jpg" alt="">

            </div>
       
            <div style="" class="logo1">
            <img style="height: 60px; position: fixed; bottom:0; right: 3px;" src="images/kultursommer.png" alt="">
            </div>
            <div class="toggle" onclick="menuToggle()"></div>
        </header>        
        <div class="glass"></div>
        <div class="content">
            <a name="top"><h2>Jacques <br> <br> Offenbach<br><span>ONLINE Grand Prix 2021</span></h2></a> <br>
        <div class="langbutton">
            <a href="index.php?lang=en">English</a> 
            | <a href="index.php?lang=gr">Ελληνικα</a>
            | <a href="index.php?lang=de">Deutsch</a>
            | <a href="index.php?lang=fr">Français</a>
        </div>
            <ul class="sci">
            <h4 style="color:white;">Organiser</h4> 
                <li style="--i:2"><a href="https://festival-gegen-den-strom.de/" target="_blank">Gegen den Strom</a></li> 
                <li style="--i:2"><a href="impressum.html" target="_blank">Impressum</a></li>
                <li style="--i:2"><a href="data.html" target="_blank">Data Policy</a></li>
                <!-- <h4 style="color:white;"> Follow us on </h4> 
                <li style="--i:1"><a href="https://www.facebook.com/offenbach.grandprix/" target="_blank">Facebook</a></li>
                <li style="--i:3"><a href="https://www.instagram.com/offenbach_grand_prix/" target="_blank">Instagram</a></li>
                -->
                <!-- <h4 style="color:white;">Choose Language</h4> 
                <li style="--i:2"><a href="index.php?lang=en"><?php echo $lang['lang_en'] ?></a> </li>
                <li style="--i:2"><a href="index.php?lang=gr"><?php echo $lang['lang_gr'] ?></a></li>
                <li style="--i:2"><a href="index.php?lang=de"><?php echo $lang['lang_de'] ?></a></li> -->
            </ul>           
        </div> 
       
        <div class="about"> 
            <a name="about"></a>
            <h3><?php echo $lang['about'] ?></h3>
            </div>
        <div class="about">
            <a name="terms"></a>
                <h3><?php echo $lang['terms'] ?></h3>
                </div> 
                <div class="about">   
                <a name="panel"></a>
                <h3><?php echo $lang['panel'] ?></h3> <br> <br> <br><br>

                <div class="annegret">
                    <div class="card1">
                <div class="front"><img src="images/annegret.jpg" alt="Annegret Ritzel" class="cover">
                </div>
          
                <div class="back">
                  <div class="details">
                    <h2>Annegret Ritzel<br><span>Stage Director</span></h2>
                    <div class="social-icons">
                    <a href="http://www.annegretritzel.de/" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="kassandra">
                  <div class="card1">
              <div class="front"><img src="images/Myron.jpg" alt="Myron Michailidis" class="cover">
              </div>
                <div class="back">
                <div class="details">
                  <h2>Myron Michailidis<br><span>Conductor <br>
                    
                  </span></h2>
                  <div class="social-icons">
                  <a href="https://en.m.wikipedia.org/wiki/Myron_Michailidis" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></a>
                    <a href=" https://www.theater-erfurt.de/Ueber-Uns/Menschen/Myron-Michailidis.html" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></a>
                    <a href="https://www.cccc.gr/gr" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></a>                 </div>
                </div>
              </div>
            </div>
            </div>


                <div class="annegret">
                    <div class="card1">
                <div class="front"><img src="images/hofstetter.jpg" alt="Michael Hofstetter" class="cover">
                </div>
          
                <div class="back">
                  <div class="details">
                    <h2>Michael Hofstetter<br><span>Conductor</span></h2>
                    <div class="social-icons">
                    <a href="https://www.michaelhofstetter.com/" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
          
           
          
            <div class="philip">
                  <div class="card1">
              <div class="front"><img src="images/creonte.png" alt="Philip Modinos" class="cover">
              </div>
                <div class="back">
                <div class="details">
                  <h2>Philip Modinos<br><span>CEO <br>
                    Hellenic Opera Co
                  </span></h2>
                  <div class="social-icons">
                  <a href="http://philipmodinos.ueuo.com/" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></a>
                  <a href="https://www.facebook.com/philip.modinos" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  </div>
                </div>
              </div>
            </div>
            </div>
           <div class="richard">
                <div class="card1">
            <div class="front"><img src="images/richard.jpg" alt="Richard Rittelmann" class="cover">            </div>
              <div class="back">
              <div class="details">
                <h2>Richard Rittelmann <br><span> <br>
                  Baritone
                </span></h2>
                <div class="social-icons">
                <a href="https://richard-rittelmann.com/" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/richard.rittelmann.baritone" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>
          </div>
          </div>

          <div class="deliso">
            <div class="card1">
        <div class="front"><img src="images/deliso.jpg" alt="Christian Deliso" class="cover">            </div>
          <div class="back">
          <div class="details">
            <h2>Christian Deliso <br><span> <br>
              Conductor
            </span></h2>
            <div class="social-icons">      
             <a href="www.oltrelirica.it" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></a> 
             <a href="https://www.facebook.com/christian.deliso" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
           <a href="https://www.instagram.com/cdeliso/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
      </div>
      </div>

      
      <div class="deliso">
            <div class="card1">
        <div class="front"><img src="images/vitali.jpg" alt="Giovanni Vitali" class="cover">            </div>
          <div class="back">
          <div class="details">
            <h2>Giovanni Vitali <br><span> <br>
              Maggio Musicale Fiorentino
            </span></h2>
            <div class="social-icons"> 
                  <a href="https://www.maggiofiorentino.com" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></a>           
            <a href="https://www.facebook.com/giovannivitali" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
      </div>
      </div>

            </div>
       
<div class="about" style="margin-top: 180px;"> 
    <a name="contact"></a>
    <h3><?php echo $lang['contact'] ?></h3>
    </div>
                
           

        <ul class="navigation">
            <li style="--i:1"><a href="#"onclick="menuToggle()"><?php echo $lang['menu1'] ?></a></li>
            <li style="--i:2"><a href="#about"onclick="menuToggle()"><?php echo $lang['menu2'] ?></a></li>
            <li style="--i:3"><a href="#terms"onclick="menuToggle()"><?php echo $lang['menu3'] ?></a></li>
            <li style="--i:4"><a href="#panel"onclick="menuToggle()"><?php echo $lang['menu4'] ?></a></li>
            <li style="--i:5"><a href="apply.php"onclick="menuToggle()"><?php echo $lang['menu5'] ?></a></li>
            <li style="--i:6"><a href="2watch.php"onclick="menuToggle()">2nd Round (for demo purposes)</a></li>
            <li style="--i:7"><a href="#contact"onclick="menuToggle()"><?php echo $lang['menu7'] ?></a></li>
            

        </ul>
    </section> 
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<script src="global.js"></script>
    <script type="text/javascript">
        function menuToggle(){
            const toggleMenu = document.querySelector('.toggle');
            const section = document.querySelector('section');
            const about = document.querySelector('.about');
            // const box = document.querySelector('.box');

            toggleMenu.classList.toggle('active');
            section.classList.toggle('active');
            about.classList.toggle('active');
            // box.classList.toggle('active');
        }
        var lastScrollTop = 0;
          sponsor = document.getElementById("sponsor");
          window.addEventListener("scroll", function(){
            var scrollTop = window.pageYoffset || document.documentElement.scrollTop;
            if (scrollTop > lastScrollTop){
              sponsor.style.top="-80px";
            } else {
              sponsor.style.top="0";
            }
            lastScrollTop=scrollTop;
          })
    </script> 

</body>
</html>				