<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contract</title>
  <!-- <link rel="stylesheet" href="confirm.css"> -->


</head>
<body>
  

<?php
  include 'mysqli_connect.php';
  require_once 'fpdf182/fpdf.php';
    $sql = "SELECT * FROM applicants WHERE id = ( SELECT MAX(id) FROM applicants)";
    $result = mysqli_query($con, $sql);
    $queryResults = mysqli_num_rows($result);

    if($queryResults > 0) {
      while ($row = mysqli_fetch_assoc($result))

      {
        echo "
        <div class='name'>
        <h3>Your name should appear here.  Make sure it's spelled correctly! <br>↓</h3>
        <h2>".$row['first_name']."&nbsp;".$row['last_name']."</h2> 
        </div>
        <br>
        <div class='photo'>
        <img src='images/".$row['photo']."'> 
        </div>
        <div class='phototext'><h3>&nbsp;&nbsp;↑ <br>Your photo should appear here. If your photo doesn't appear try using a different filename. If your photo isn't centered, try cropping it on your computer and upload it again.</h3></div>
        <br> <br><br><br>
        <div class='link'>
        ".$row['link_of_video']." <h3>↑ <br>Your video should appear here.  If instead only a line of code appears, this means that you didn't upload the embed link. Please make sure you follow the instructions carefully!</h3>
        </div> <br><br>
        <div class='info'>
        <h3>Your personal information should appear here. This will not be revealed to the public, but is essential in case you win.  Email and contact number are particularly important.  Please make sure it's correct! <br>↓</h3> 
        <h2>Address:&nbsp".$row['address']." <br>
        City:&nbsp".$row['city']." <br>
        Country:&nbsp".$row['country']." <br>
        Postcode:&nbsp".$row['postcode']." <br>
        Email:&nbsp".$row['email']." <br>
        Contact Number:&nbsp".$row['contact_number']." <br>
        Voice Type:&nbsp".$row['voice_type']." <br>
        Date of Application:&nbsp".$row['receivedOn']." <br>
        </h2>
        </div> <br><br><br>
        <div class='pdf'>
        <h3>Your biography should appear here.  If it's not a pdf it will probably not work. Please make sure it's not too long. <br>↓</h3>
        <embed src='images/".$row['biog']."' width='600px' height='800px' />
        <h3>Your payment receipt should appear here. If it's not a pdf it will probably not work. <br>↓</h3>
        <embed src='images/".$row['receipt']."' width='600px' height='800px' /> <br> <br>
        <h3>If there's something you don't like you will have to delete your application and start again. By clicking the 'Delete' button, the application will no longer exist. You will be redirected to the 'Apply' page and you can reenter your data.</h3>
        </div>
        <div class='delete'>
        <a href='delete.php?id=".$row['id']."'>Delete</a>
        <a href='pdf_gen.php?id=".$row['id']."'>PDF</a>

        </div>
        ";
      }
    }  
    
   ?>

<form action='pdf_gen.php?id=".$row['id']."' method='POST'>
  <!-- <input type="hidden" value="<?php echo $id;?>" name="id"></input> -->
  <button type="submit" name="btn_pdf" class="btn btn-success">PDF</button>
</form>



</body>
</html>