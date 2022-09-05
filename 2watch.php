<!-- Add pagination https://www.allphptricks.com/create-simple-pagination-using-php-and-mysqli/
Add advertisement of Spoiled eggs and E & V -->

<?php

// The session start works in conjuction with the logged in issue.
session_start();
$loggedIn = false;
include ('helper.php');


if (isset($_SESSION['loggedIn']) && isset($_SESSION['firstName'])) {
    $loggedIn = true;
}

if(isset($_SESSION['loggedIn']) && isset($_SESSION['userID'])){
    require ('mysqli_connect.php');
    $loggedIn = true;
    $user = get_user_info($con, $_SESSION['userID']);
}

include 'mysqli_connect.php';


// $con = new mysqli('localhost', 'root', 'virtuoso', 'spoiledeggs');

// Connecting LogIn Modal with Database; don't forget Ajax script that goes with it.

if (isset($_POST['logIn'])) {
    $email = $con->real_escape_string($_POST['email']);
    $password = $con->real_escape_string($_POST['password']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = $con->query("SELECT * FROM user WHERE email='$email'");
        if ($sql->num_rows == 0)
            exit('failed');
        else {
            $data = $sql->fetch_assoc();
            $passwordHash = $data['password'];

            if (password_verify($password, $passwordHash)) {
                $_SESSION['loggedIn'] = 1;
                $_SESSION['firstName'] = $data['firstName'];
                $_SESSION['email'] = $email;
                $_SESSION['userID'] = $data['userID'];
                  $_SESSION['profileImage'] = $files['profileImage'];

                exit('success');
            } else
                exit('failed');
        }
    } else
        exit('failed');
}
  


// Echoing the number of entries, in this case comments

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>2nd Round</title>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="shortcut icon" type="image/png" href="favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="watch.css">

  </head>
  <body>

<section>
      <div class="crop">
      <img src="<?php echo isset($user['profileImage']) ? $user['profileImage'] : './img/beard.png'; ?>" alt="">
            </div>

    <div class="user">
      <?php

      if (!$loggedIn)
          echo '<h3>You are not logged in!</h3>';
      else
          echo '<h3>Hello '.$_SESSION['firstName'].' </h3>'
      ?>
</div>
</section>


    <header>
      <h5>Hosted by:</h5>
    <a href="http://spoiledeggs.eu5.org/" target="_blank" class="logo"> <img src="img/egglogo.png" alt=""> </a>

      <div class="menu-toggle"></div>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="watch.php" class="active">Watch</a></li>
          <li><a href="#modal" data-toggle="modal" data-target="#InstructionsModal">Instructions</a></li>
          <li><a href="#modal" data-toggle="modal" data-target="#ContactModal">Contact</a></li>
          <li>
            <?php
            if (!$loggedIn)
                echo '
            <a href="#modal" data-toggle="modal" data-target="#logInModal">Login/Register</a>';
            else
                echo '
                    <a href="2logout.php">Log Out</a>
                ';
            ?>
          </li>
          <li>
          <?php
            if (!$loggedIn)
                echo '';
            else
                echo '
                <a href="2user.php">Your Profile</a>
                ';
                ?>
          </li>
        </ul>
      </nav>
      <div class="clearfix"></div>
    </header>

    <div class="modal" id="InstructionsModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Instructions</h5>
                </div>
                <div class="modal-body">
                    <h4>Welcome to the singing competition where your vote counts! <br> <br>
                    1.  Click on a contestant from the list below. You can browse randomly or alphabetically and you can also browse by ranking of public's applause or jury's votes.<br> <br>
                    2.  Once on a contestant's page, click the video button and listen to their entry. After watching the video, scroll down on the contestant's page to applaud and comment.<br> <br>
                    3.  Applaud!  Click the applause button as many times as you like to support the singer.  The 30 highest applause rankings will count as one juror's vote. For the second round you must login to applaud.<br> <br>
                    4.  Comments:  You must register and login to comment.  You may comment on a singer's performance and on a juror's decision.  You must remain polite and constructive!  Inappropriate comments and spam will be deleted by the administrator.</h4>
                  </div>
                  <div class="modal-footer">
                    <button data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>


      <div class="modal" id="ContactModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Contact</h5>
                </div>
                <div class="modal-body">
                    <h4 style="font: 5px;">You may contact the administrator of this website for technical problems only on festivalgegendenstromchannel21@<br>gmail.com</h4>
                  </div>
                  <div class="modal-footer">
                    <button data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>


    <div class="modal" id="logInModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Log In Form</h5>
                </div>
                <div class="modal-body">
                    <input type="email" id="userLEmail" class="form-control" placeholder="Your Email">
                    <input type="password" id="userLPassword" class="form-control" placeholder="Password">
                </div>
                <div class="modal-footer">
              <ul><li><a href="register.php">Register</a></li></ul>
                    <button id="loginBtn">Log In</button>
                    <button data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="search-user">
    <form action="2search.php" method="POST">
        <input type="text" name="search" placeholder="Search for a contestant by last name only!">
        <button type="submit" name="submit-search"><i class="fa fa-search" aria-hidden="true"></i></button>
      </form>

  </div>


<div class="container">
<div class="myButton">
  <a href="2watch.php" class="active" >Random</a>
  <a href="2watchabc.php" >Alphabetically</a>
  <a href="2watchappl.php" >Ranking by Applause</a>
  <a href="2watchrank.php" >Jury's Ranking</a>
  </div>
  <div id='img_div'>


<h3>Contestants</h3>
<h5>Click on a name to vote</h5><hr>
<ul>
  <?php
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	$page_no = $_GET['page_no'];
	} else {
		$page_no = 1;
        }

	$total_records_per_page = 8;
    $offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2"; 

	$result_count = mysqli_query($con,"SELECT COUNT(*) As total_records FROM `applicants2`");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total page minus 1

    $result = mysqli_query($con,"SELECT * FROM `applicants2` ORDER BY RAND() LIMIT $offset, $total_records_per_page");
    while($row = mysqli_fetch_array($result)){
        echo "<a href='2vote.php?appID=".$row['appID']."&first_name=".$row['first_name']."&last_name=".$row['last_name']."&voice_type=".$row['voice_type']."' target='_blank'>


      <li><img src='images/".$row['photo']."'>
      <p>Name:&nbsp;".$row['first_name']."&nbsp;".$row['last_name']." <br>
      Voice:&nbsp;".$row['voice_type']."<br>
      Jury's Vote so far:&nbsp;".$row['dislike_count']." out of 6 Votes!<br>
      Public's applause Results:&nbsp;".$row['like_count']." Claps!<p> <br> <br>
    </a><br></li>";

    }
    mysqli_close($con);
    ?>
    </ul>
</div>
  <br> <div class="myButton">
  <a href="#top"> <span> Back to top </span> </a>
  </div>
  <br>

</ul>
<!-- </div> -->
<!-- </div> container-->
<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC; width: 200px; background:white;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>

<ul class="pagination">
	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
	<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
	</li>
       
    <?php 
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
		echo "<li><a>...</a></li>";
		echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
		echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                  
       }
       echo "<li><a>...</a></li>";
	   echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
	   echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
		
		else {
        echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
?>
    
	<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
	</li>
    <?php if($page_no < $total_no_of_pages){
		echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
		} ?>
</ul>

<!-- container -->
</div></div>
  </body>
  <script src="js/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script type="text/javascript">
      $(document).ready(function(){
        $('.menu-toggle').click(function(){
          $('.menu-toggle').toggleClass('active')
          $('nav').toggleClass('active')
        });

// Script section that ensures login inputs are not empty.
      $("#loginBtn").on('click', function () {
          var email = $("#userLEmail").val();
          var password = $("#userLPassword").val();

          if (email != "" && password != "") {
              $.ajax({
                  url: '2watch.php',
                  method: 'POST',
                  dataType: 'text',
                  data: {
                      logIn: 1,
                      email: email,
                      password: password
                  }, success: function (response) {
                      if (response === 'failed')
                          alert('Please check your login details!');
                      else
                          window.location = window.location;
                  }
              });
          } else
              alert('Please Check Your Inputs');
      });
});




  </script>

</html>
