<?php
include "config.php";
include 'mysqli_connect.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Confirmation</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <link rel="stylesheet" href="confirm.css">

  </head>
  <body>
  <div class="blur-container">
<div class="blur">

    <header>
        <h1><?php echo $lang['conf1'] ?></h1>

    </header>

    <div class="applicant" >
    <h2><?php echo $lang['conf2'] ?></h2>
      <h3><?php echo $lang['conf3'] ?></h3> <br><br>
</div>
  <?php
  
    $sql = "SELECT * FROM applicants WHERE appID = ( SELECT MAX(appID) FROM applicants)";
    $result = mysqli_query($con, $sql);
    $queryResults = mysqli_num_rows($result);

    if($queryResults > 0) {
      while ($row = mysqli_fetch_assoc($result))

      {
        echo "
        <div class='name'>
        <h3>".$lang['conf4']." <br>↓</h3>
        <h2>".$row['first_name']."&nbsp;".$row['last_name']."</h2> 
        </div>
        <br>
        <div class='photo'>
        <img src='images/".$row['photo']."'> 
        </div>
        <div class='phototext'><h3>&nbsp;&nbsp;↑ <br>".$lang['conf5']."</h3></div>
        <br> <br><br><br>
        <div class='link'>
        ".$row['link_of_video']." <h3>↑ <br>".$lang['conf6']."</h3>
        </div> <br><br>
        <div class='info'>
        <h3>".$lang['conf7']."<br>↓</h3> 
        <h2>".$lang['conf8']."&nbsp".$row['address']." <br>
        ".$lang['conf9']."&nbsp".$row['city']." <br>
        ".$lang['conf10']."&nbsp".$row['country']." <br>
        ".$lang['conf11']."&nbsp".$row['postcode']." <br>
        ".$lang['conf12']."&nbsp".$row['email']." <br>
        ".$lang['conf13']."&nbsp".$row['contact_number']." <br>
        ".$lang['conf14']."&nbsp".$row['voice_type']." <br>
        ".$lang['conf15']."&nbsp".$row['receivedOn']." <br>
        </h2>
        </div> <br><br><br>
        <div class='pdf'>
        <h3>".$lang['conf16']." <br>↓</h3>
        <embed src='images/".$row['biog']."' width='600px' height='800px' />
        <h3>".$lang['conf17']." <br>↓</h3>
        <embed src='images/".$row['receipt']."' width='600px' height='800px' /> <br> <br>
        <h3>".$lang['conf18']."</h3>
        </div>
        <div class='delete'>
        <a style=''href='delete.php?appID=".$row['appID']."'>".$lang['conf19']."</a>
        </div>
        <div class='done'>
        <h3>".$lang['conf20']."</h3>
        <a href='contract.php?appID=".$row['appID']."'>".$lang['conf21']."</a>
        ";
      }
    }    
   ?>

 <br> <br> <br> <br>
</div>
</div>
</div>

</body>
</html>
<!-- https://www.11zon.com/zon/php/php-mysql-delete-row-button.php -->

<!-- Try https://pdf-ace.com/save-as-pdf-button for pdf -->