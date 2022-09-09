<?php
include "config.php";
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

    <title>Apply</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <link rel="stylesheet" href="indexstyle.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<style type="text/css">
body{
        background: url(images/pattern1.png);
	background-repeat:repeat;
	background-attachment:fixed;
	background-position:center;
}
  </style>

</head>
<body>
   
<a href="index.php" class="myButton"><?php echo $lang['menu1'] ?></a>
    <section>
     
        
        <div class="about"></a>

<h3><?php echo $lang['apply1'] ?>
<img src="images/img0.png" alt=""> <br> <br>
<?php echo $lang['apply2'] ?>
<img src="images/img1.png" alt=""> <br> <br>
<?php echo $lang['apply3'] ?>
<img src="images/img2.png" alt=""> <br> <br>
<?php echo $lang['apply4'] ?>
</h3>


  <div class="box"> <a name="apply"></a>
<h2><?php if(isset($errors['v'])) echo $errors['v']; ?> <br>
<?php echo $lang['form1'] ?> <br></h2>
<form method="POST" action="apply.php#apply" enctype="multipart/form-data">
    <div class="inputBox">
        <input type="text" name="first_name" required="">
        <label><?php echo $lang['form2'] ?></label>
    </div>
    
    <div class="inputBox">
        <input type="text" name="last_name" required="">
        <label><?php echo $lang['form3'] ?></label>
    </div>

    <div class="inputBox">
        <input type="text" name="address" required="">
        <label><?php echo $lang['form4'] ?></label>
    </div>

    <div class="inputBox">
        <input type="text" name="city" required="">
        <label><?php echo $lang['form5'] ?></label>
    </div>


    <div class="inputBox">
        <input type="text" name="country" required="">
        <label><?php echo $lang['form6'] ?></label>
    </div>
    
    <div class="inputBox">
        <input type="text" name="postcode" required="">
        <label><?php echo $lang['form7'] ?></label>
    </div>
    
    <div class="inputBox">
        <input type="text" name="email" required="">
        <label><?php echo $lang['form8'] ?></label>
    </div>

    <div class="inputBox">
        <input type="text" name="contact_number" required="">
        <label><?php echo $lang['form9'] ?></label>
    </div>

    <div class="inputBox">
        <input type="text" name="voice_type" required="">
        <label><?php echo $lang['form10'] ?></label>
    </div>

    <div class="inputBox">
        <input type="link" name="link_of_video" required="">
        <label><?php echo $lang['form11'] ?></label>
    </div>
  
    <div class="uploadBox">
      <input type="hidden" name="size" value="1000000">
    <label style="color:#fff;"><?php echo $lang['form12'] ?> <br></label>
      <input style="color:#fff;" type="file" name="photo" required="">
   
  <br> <br>
    <input type="hidden" name="biog" value="1000000">
    <label style="color:#fff;"><?php echo $lang['form13'] ?></label> <br> 
      <input style="color:#fff;" type="file" name="biog" required="">
    
    <br> <br>

    <input type="hidden" name="receipt" value="1000000">
    <label style="color:#fff;"><?php echo $lang['form14'] ?></label> <br>
      <input style="color:#fff;" type="file" name="receipt" required="">
    </div>
    <br> <br>

<input type="submit" name="insert" value="<?php echo $lang['form15'] ?>">
</form>


</div>
</div>
</section>
</body>
</html>			