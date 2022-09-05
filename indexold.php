<?php
require ('mysqli_connect.php');

if (isset($_POST['insert'])) {

  $first_name= $con->real_escape_string($_POST['first_name']);
  $last_name = $con->real_escape_string($_POST['last_name']);
  $address = $con->real_escape_string($_POST['address']);
  $city = $con->real_escape_string($_POST['city']);
  $country = $con->real_escape_string($_POST['country']);
  $postcode = $con->real_escape_string($_POST['postcode']);
  $email = $con->real_escape_string($_POST['email']);
  $contact_number = $con->real_escape_string($_POST['contact_number']);
  $voice_type = $con->real_escape_string($_POST['voice_type']);
  $link_of_video = $con->real_escape_string($_POST['link_of_video']);
  $photo = $_FILES['photo']['name'];
  $biog = $_FILES['biog']['name'];
  $receipt = $_FILES['receipt']['name'];
  $target = "images/".basename($photo);
  $targetb = "images/".basename($biog);
  $targetr = "images/".basename($receipt);

//   $files = $_FILES['profileUpload'];
//   $profileImage = upload_profile('./profilepics/', $files);



  $query = "INSERT INTO applicants(first_name,last_name,address,city,country,postcode,email,contact_number,voice_type,link_of_video,photo,biog,receipt,receivedOn)
  VALUES ('$first_name','$last_name','$address','$city', '$country','$postcode','$email','$contact_number','$voice_type','$link_of_video','$photo', '$biog', '$receipt', NOW())";
// Very important line to get file into folder
  move_uploaded_file($_FILES['photo']['tmp_name'], $target);
  move_uploaded_file($_FILES['biog']['tmp_name'], $targetb);
  move_uploaded_file($_FILES['receipt']['tmp_name'], $targetr);


  $result = mysqli_query($con,$query);

  if ($result) {
    header("Location: confirmation.php");
// die();

}
    else
    {
      $errors['v'] = "Applicant already exists!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OffenbachGP</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <link rel="stylesheet" href="indexstyle.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<style type="text/css">
body{
        background: url(images/marmor.jpg);
	background-repeat:no-repeat;
	background-attachment:fixed;
	background-position:center;
}
  </style>

</head>
<body>
   
    <section>
     
        <header>
            <!-- <a href="#" class="logo">Performance<br> opportunities<br> online</a> -->
            <div style="" class="logo1">
            <img style="height: 20; width: 70px; position: fixed; bottom:25vh; right: 5px;" src="images/logo2.png" alt="">
            </div>
            <div style="" class="logo1">
            <img style="width: 50px; position: fixed; bottom:20vh; right: 5px;" src="images/logo3.png" alt="">
            </div>
            <div style="" class="logo1">
            <img style="height: 20; width: 70px; position: fixed; bottom:15vh; right: 5px;" src="images/logo4.png" alt="">
            </div>
            <div style="" class="logo1">
            <img style="height: 60px; position: fixed; bottom:0; right: 3px;" src="images/kultursommer.png" alt="">
            </div>
            <div class="toggle" onclick="menuToggle()"></div>
        </header>        
        <div class="glass"></div>
        <div class="content">
            <a name="top"><h2>J.Offenbach<br><span>Grand Prix 2021</span></h2></a>   
            <ul class="sci">
            <h4 style="color:white;">Organiser</h4> 
                <li style="--i:2"><a href="https://festival-gegen-den-strom.de/" target="_blank">Gegen den Strom</a></li> 
                <li style="--i:2"><a href="impressum.html" target="_blank">Impressum</a></li>
                <li style="--i:2"><a href="data.html" target="_blank">Data Policy</a></li>
                <h4 style="color:white;"> Follow us on </h4> 
                <li style="--i:1"><a href="https://www.facebook.com/offenbach.grandprix/" target="_blank">Facebook</a></li>
                <li style="--i:3"><a href="https://www.instagram.com/offenbach_grand_prix/" target="_blank">Instagram</a></li>
               
            </ul>           
        </div> 
       
        <div class="about"> 
            <a name="about"></a>
            <h3>About:<br> <br> Τhe "Jacques Offenbach Grand Prix" is a new initiative by the "Festival Gegen den Strom" in Bad Ems.
This international singing competition puts Jacques Offenbach in the spotlight and creates a new platform for professional singers where they can present themselves and connect to opera companies and festivals.
Singers from all over the world will compete with a variety of repertoire, including some mandatory repertoire by the composer, for a chance to win monetary prizes as well as to partake in future productions and masterclasses.
What makes this event special and unique, is that the audience will be given a voice in the result, as the audience's vote will count like a judge's vote.
<br> <br> <br>
Grand Prix and International Summer Opera Academy <br> <br>
The "Jacques Offenbach Grand Prix" is supposed to connect directly to the International Summer Opera Academy - also a new project by "Festival Gegen den Strom" that was scheduled to start in the summer of 2021. All winners of the Grand Prix would be hired as soloists in the final operatic production of Jacques Offenbach's opera "Tales of Hoffmann" which would also include students of the Academy for minor roles and ensemble, but due to the pandemic, the Academy had to be cancelled. 
This year's Grand Prix will take place online and the winners will be considered for future productions of the "Festival Gegen den Strom" and of the Opera Companies and Festivals the members of this panel represent. </h3>
            </div>
        <div class="about">
            <a name="terms"></a>
                <h3>Terms & Conditions: <br> <br>1.  GENERAL CONDITIONS <br> <br>

                    1.1  The 2021 Grand Prix has one category: Opera/Operetta
                   <br> 
                    1.2  The Grand Prix is open to all opera singers <br>-of all nationalities <br> -who are over 18 years old <br> -who have completed their studies in classical singing <br> -who have not been students of a member of the panel for at least two years.
                    <br>
                    1.3  All rounds of the Grand Prix will take place online, due to the restrictions of the Covid19 pandemic.
                    <br>
                    1.4  All decisions of the jury shall be final.
                    <br>
                    1.5  All correspondence will be in English.
                    <br> <br>
                    2.  APPLICATION AND ENTRY FEE
                    <br> <br>
                    2.1  Payment and application deadline:  31st March, 2021.
                    <br>
                    2.2  Applications can only be made on this website. (Go to Apply from Menu.)
                    <br>
                    2.3  The application will only be processed after the participant has paid the application fee and submitted all required information and documentation correctly.
                    <br>
                    2.4  Entry fee: € 50.
                    <br>
                    2.5  Entry fee is payable by bank transfer only.
                    <br>
                    2.7  Fee is non-refundable.
                    <br>
                    2.8  Successful participants will have to upload an image of their id or passport after the 2nd Round.
                    <br> <br>
                    
                    3.  THE COMPETITION
                    <br> <br>
                    3.1  The 2021 Grand Prix will take place online, due to the Covid19 pandemic.
                    <br>
                    3.2  All participants will have to send videos no more than 3 years old.
                    <br>
                    3.3  Quality of resolution and sound of video may affect the panel’s decision.
                    <br>
                    3.4  Recordings of live performances are acceptable (including with orchestra) as well as studio recordings with piano. Recordings done with backing tracks (Karaoke) are not accepted. 
                    <br>
                    3.5  The videos of the finalists will be public on the website of the competition, so that the public can vote.
                    <br>
                    3.6  The competition will be in three rounds.
                    <br> <br>
                    
                    
                    4.  THE REPERTOIRE
                    <br><br>
                    4.1  The repertory of this Grand Prix is opera and operetta in the original language only.
                    <br>
                    4.2  For the 1st Round, participants will have to send one video of an aria of their choice of them singing on stage (or in concert).
                    <br>
                    4.3  For the 2nd Round participants will have to send one video of a German aria of their choice and one video of an aria from an opera or operetta by Jacques Offenbach. Videos can be studio recordings or from a live performance.
                    <br>
                    4.4  For the 3rd Round (final) participants will have to send three videos, each video recorded in one take (one camera) for the competition. The mandatory repertoire for all participants in this round are one aria by Jacques Offenbach (opera or operetta), one French aria of their choice and one Italian aria of their choice.  Finalists will be given due notice allowing them 2 weeks to record the videos. 
                    <br>
                    <br><br>
                    
                    5.  PRIZES <br><br>
                    1st Prize:  € 1.500 <br><br>
                    2nd Prize: € 1.000 <br><br>
                    3rd Prize: € 500 <br><br>
                    <br>
                
                    <br>
                    Together with the prizes, the winners of the Grand Prix will be offered scholarships and possible work opportunities by all members of the panel.
                    <br><br>
                    6.  PANEL <br><br>
                    1. Annegret Ritzel <br>
                    Head of the panel <br>Stage Director/Intendantin a. D. Dozentin at Otto Falckenberg- Schule (D) <br><br>
                    2. Michael Hofstetter <br>
                    Conductor (D) <br><br>
                    3. Kassandra Dimopoulou <br>
                    Mezzo soprano/ Artistic Director of “Hellenic Opera Co.” and “Greek Opera Festival” (GR)/ Editor “Opera Legacy” <br><br>
                    4. Philip Modinos <br>
                    Tenor/ Pianist/ Director of “Hellenic Opera Co.” (GR) <br><br>
                    5. Richard Rittelmann<br>
                    Baritone/ Artistic Director of “Rosaces Art Productions” (FR) <br><br>
                    6. Christian Deliso<br>
                    Conductor/ Pianist/ Musical Director “Oscar della Lyrica” (I)<br><br>
                    7. Giovanni Vitali<br>
                    Director of Cultural Promotion for Maggio Musicale Fiorentino <br> Artistic Director of Solo Belcanto Montisi-Montalcino (I)
                    
                   
                     </h3>
                </div> 
                <div class="about">   
                <a name="panel"></a>
                <h3>Panel  (touch images for info)</h3> <br> <br> <br><br>

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
          
          
            <div class="kassandra">
                  <div class="card1">
              <div class="front"><img src="images/kassandra.png" alt="Kassandra Dimopoulou" class="cover">
              </div>
                <div class="back">
                <div class="details">
                  <h2>Kassandra Dimopoulou<br><span>Director <br>
                    Hellenic Opera Co
                  </span></h2>
                  <div class="social-icons">
                  <a href="https://www.kassandradimopoulou.com/" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></a>
                    <a href="https://www.youtube.com/user/KassandraSoprano" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                    <a href="https://www.facebook.com/KassandraDimopoulouOfficial/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="https://twitter.com/DimopoulouKass" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
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
        <div class="about"><a name="apply"></a>

            <h3>Apply <br><br>
          At the end of the Apply section is an online form for you to fill out.  Before you fill out the form you must first pay the fee to the following account: <br>
          Kto. NASPA Gegen den Strom- Festival an der Lahn e.V. <br> <br> 
            IBAN  DE38 5105 0015 0563 2476 42
            <br>
            BIC: NASSDE55XXX <br> <br>
            Please ensure that you put your name in the notes/description of your payment.  Also, please ensure to acquire proof of payment as a pdf after your fee is paid, such as a pay slip or a receipt. (YOU WILL NOT BE ABLE TO PROGRESS IN YOUR APPLICATION WITHOUT THIS EVIDENCE!) <br> <br>
            Fill out all fields carefully and correctly.  You must upload a photo portrait of yourself as a jpg/png and a short biography in PDF form.  Please name all files with your name and day or date of birth to ensure that the names of your files are unique. <br> <br>
            Video: <br>
            You must upload your video to youtube and then embed the video to this website (below).
            Please ensure to follow the instructions carefully! <br>
            How to embed a video: <br>
            1. Go to the YouTube video you want to embed. <br>
            2. Under the video, click SHARE. <br>
            3. Click Embed. <br>
            4. From the box that appears, click the copy button on the bottom right. <br>
            5. Paste the code into the field marked "Link of Video".  <br> <br>
            Please carefully follow all these steps to ensure a smooth upload of your application.  <br> <br>
            By clicking submit: <br> You agree to our terms and conditions. <br> You automatically give consent for your personal data to be processed. <br> You state responsibly that the receipt of payment you will provide is genuine. <br>
            Good Luck!!            
          </h3>
        
            
        <div class="box">
            <h2><?php if(isset($errors['v'])) echo $errors['v']; ?> <br>
            Apply <br></h2>
            <form method="POST" action="index.php#apply" enctype="multipart/form-data">
                <div class="inputBox">
                    <input type="text" name="first_name" required="">
                    <label>First Name</label>
                </div>
                
                <div class="inputBox">
                    <input type="text" name="last_name" required="">
                    <label>Last Name</label>
                </div>
    
                <div class="inputBox">
                    <input type="text" name="address" required="">
                    <label>Address & Number</label>
                </div>
    
                <div class="inputBox">
                    <input type="text" name="city" required="">
                    <label>City</label>
                </div>
    
    
                <div class="inputBox">
                    <input type="text" name="country" required="">
                    <label>Country</label>
                </div>
                
                <div class="inputBox">
                    <input type="text" name="postcode" required="">
                    <label>Postcode</label>
                </div>
                
                <div class="inputBox">
                    <input type="text" name="email" required="">
                    <label>Email</label>
                </div>
    
                <div class="inputBox">
                    <input type="text" name="contact_number" required="">
                    <label>Contact Number</label>
                </div>
    
                <div class="inputBox">
                    <input type="text" name="voice_type" required="">
                    <label>Voice Type</label>
                </div>
    
                <div class="inputBox">
                    <input type="link" name="link_of_video" required="">
                    <label>Link of Video</label>
                </div>
              
                <div class="uploadBox">
              	<input type="hidden" name="size" value="1000000">
                <label style="color:#fff;">Photo of Applicant <br></label>
                  <input style="color:#fff;" type="file" name="photo" required="">
               
              <br> <br>
                <input type="hidden" name="biog" value="1000000">
                <label style="color:#fff;">Short Biography of Applicant</label> <br> 
                  <input style="color:#fff;" type="file" name="biog" required="">
                
                <br> <br>

                <input type="hidden" name="receipt" value="1000000">
                <label style="color:#fff;">Receipt of payment</label> <br>
                  <input style="color:#fff;" type="file" name="receipt" required="">
                </div>
                <br> <br>
 
            <input type="submit" name="insert" value="Submit">
            </form>
    
    </div>
</div>
<div class="about" style="margin-top: 180px;"> 
    <a name="contact"></a>
    <h3>Contact Admin<br>You may contact the administrator of this site on the email festivalgegendenstromchannel21@gmail.com for technical problems only.   </h3>
    </div>
                
           

        <ul class="navigation">
            <li style="--i:1"><a href="#"onclick="menuToggle()">Home</a></li>
            <li style="--i:2"><a href="#about"onclick="menuToggle()">About</a></li>
            <li style="--i:3"><a href="#terms"onclick="menuToggle()">Terms & Conditions</a></li>
            <li style="--i:4"><a href="#panel"onclick="menuToggle()">Panel</a></li>
            <li style="--i:5"><a href="#apply"onclick="menuToggle()">Apply</a></li>
            <li style="--i:6"><a href="watch.html"onclick="menuToggle()">Watch & Vote</a></li>
            <li style="--i:7"><a href="#contact"onclick="menuToggle()">Contact Admin</a></li>
            

        </ul>
    </section> 
    
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
    </script>   
</body>
</html>			