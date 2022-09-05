<?php
session_start();
$loggedIn = false;
include ('helper.php');
include ('mysqli_connect.php');

if (isset($_SESSION['loggedIn']) && isset($_SESSION['userID'])) {
  // require ('mysqli_connect.php');
    $loggedIn = true;
    $user = get_user_info($con, $_SESSION['userID']);

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>2nd Rnd Vote</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="favicon.ico">
    <link rel="stylesheet" href="2vote.css">

<!-- Like-Dislike Start -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Like-Dislike End -->

</head>
  <body>
<section>
      <div class="crop">
      <img src="<?php echo isset($user['profileImage']) ? $user['profileImage'] : 'img/beard.png'; ?>" alt="">
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
<div class="back">
<a href="javascript:close_window();">Close</a>
</div>

<?php
$appID= mysqli_real_escape_string($con, $_GET['appID']);
$first_name= mysqli_real_escape_string($con, $_GET['first_name']);
$last_name= mysqli_real_escape_string($con, $_GET['last_name']);
$voice_type= mysqli_real_escape_string($con, $_GET['voice_type']);

$sql = "SELECT * FROM applicants2 WHERE appID = '$appID' AND first_name = '$first_name' AND last_name = '$last_name' AND voice_type = '$voice_type'";

    $result = mysqli_query($con, $sql);
    $queryResults = mysqli_num_rows($result);

    if($queryResults > 0) {
      while ($row = mysqli_fetch_assoc($result))

      { ?>


  <div class="banner">
   <br>
   <div class="trailer">
   <?php echo " <h2>".$row['first_name']."&nbsp;".$row['last_name']."&nbsp;|&nbsp;".$row['voice_type']."</h2>";?>
       <h2>2nd Round Video I</h2> <br> 
       <?php echo $row['link_of_video1'];?> <br> 
       <h2>2nd Round Video II</h2> <br> <br>
      <?php echo $row['link_of_video2'];?>
    </div> <br>
      <div class="content">
          
        <img src="images/<?php echo $row['photo']?>" alt="">
        <?php echo "<p><iframe src='images/".$row['biog']."'></iframe></p>";?>
        <?php
if (!$loggedIn)
       echo "
        <br>
        <h2>Log in to comment or applaud.  (Close Window, log in and return to this page after login.)</h2>";
        else " ";
        ?>
      </div>
    </div>
    
<br> <br>
    <div class="like"> 
       <a href="javascript:void(0)" class="">
         <span class="fa fa-hand-paper-o" onclick="like_update('<?php echo $row['appID']?>')"> &nbsp;&nbsp;Applause (<span id="like_loop_<?php echo $row['appID']?>"><?php echo $row['like_count']?></span>)</span>
       </a></div> <br> <br>
       <div class="judgevote"> 
       <span class="fa fa-trophy">&nbsp;&nbsp;Jury's Vote (<span id="like_loop_<?php echo $row['appID']?>"><?php echo $row['dislike_count']?>&nbsp;of 6</span>)</span>
       </div>
   <?php }} ?>
   
   
<br> <br>

<!-- Judge Comments start -->
<div class="commentsout">
<?php 
$sql = "SELECT * FROM jcomments INNER JOIN juser ON jcomments.userID = juser.userID INNER JOIN applicants2 ON jcomments.applicID = applicants2.appID WHERE applicID = '$appID' ORDER BY jcomments.id DESC";

$result = mysqli_query($con, $sql);
$queryResults = mysqli_num_rows($result);

  
if($queryResults > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo " <br><br> <div class='reviewinfo'>
      <img src='".$row['profileImage']."'>
      <h5>Jury Member:&nbsp;&nbsp;".$row['firstName']."&nbsp;".$row['lastName']."&nbsp;on&nbsp;".$row['createdOn']."&nbsp;wrote</h5></div>
     <div class='comment'><h4>".$row['comment']."</h4> <hr>
      </div><br><br>";

} } 
?>


</div>

<!-- Comments start -->
<?php
if (isset($_POST['insert'])) {

  // $applicID = $con->real_escape_string($_POST['$entryID']);
  $comment= $con->real_escape_string($_POST['comment']);


  $errors = array();

  if(empty($comment)) {
    $errors['r'] = "Review Required";
  }

  if (count($errors)==0) {

     $query = "INSERT INTO comments (userID, applicID, comment, createdOn) VALUES ('".$_SESSION['userID']."','$appID','$comment',NOW())";


    $result = mysqli_query($con,$query);

   //  vote.php?appID=$appID&first_name=$first_name&last_name=$last_name&voice_type=$voice_type&receivedOn=$receivedOn#comment
  if ($result) {
    header("Location: 2vote.php?appID=$appID&first_name=$first_name&last_name=$last_name&voice_type=$voice_type#comment");
die();

    // echo "<script>alert('done')</script>"
  }
  else{

    echo "<script>alert('failed')</script>";
  }
  }
}
?>





<!-- <input type='text' name='comment' id='comment' placeholder='Write a comment.' class='form-control'>
<button type='submit' name='insert' value='insert' style='padding:5px;'><span>&nbsp;&nbsp;Insert&nbsp;&nbsp;</span></button> -->

<?php
if (!$loggedIn)
       echo "<div class='logout'><h3>Log in to comment or applaud.  (Close Window, log in and return to this page after login.)</h3></div>";
   else echo "<br><div class='commentsin'>
   <form method='post'><div class='row'><textarea placeholder='Write a comment.' type='text' name='comment' id='comment'></textarea> <br> 
   <button type='submit' name='insert' value='insert' style='padding:5px;'><span>&nbsp;&nbsp;Insert&nbsp;&nbsp;</span></button></div>
   </form>
   </div>
   "?>
<br>
       <p class="text-danger"> <?php if(isset($errors['r'])) echo $errors['r']; ?> </p>
       <br><br><br>
       



<a name="comment"></a>
<div class="commentsout">

    <?php

    $appID= mysqli_real_escape_string($con, $_GET['appID']);
    // $userID = mysqli_real_escape_string($con, $_GET['userID']);
    // $firstName = mysqli_real_escape_string($con, $_GET['firstName']);
    // $lastName = mysqli_real_escape_string($con, $_GET['lastName']);

    $sql = "SELECT * FROM comments INNER JOIN user ON comments.userID = user.userID INNER JOIN applicants2 ON comments.applicID = applicants2.appID WHERE applicID = '$appID' ORDER BY comments.id DESC";

    $result = mysqli_query($con, $sql);
    $queryResults = mysqli_num_rows($result);

      
   if($queryResults > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<div class='reviewinfo'>
          <img src='".$row['profileImage']."'>   
          <h5>".$row['firstName']."&nbsp;".$row['lastName']."&nbsp;on&nbsp;".$row['createdOn']."&nbsp;wrote</h5></div>
         <div class='comment'><h4>".$row['comment']."</h4> <hr>
          </div><br><br>";

    }}       
     ?>        
     </div>
<!-- Comments End -->
<script>
function close_window() {
      close();
  }
</script>


<?php
if (!$loggedIn)
       echo "
       ";
       else echo "
<script>
        // Like-Dislike Start
        function like_update(id){
          jQuery.ajax({
            url:'update_count.php',
            type:'post',
            //this id corresponds to php name
            data:'type=like&appID='+id,
            success:function(result){
              var cur_count=jQuery('#like_loop_'+id).html();
              cur_count++;
              jQuery('#like_loop_'+id).html(cur_count);

            }
          });
        }
        
</script> 
"?>
</body>
</html>