<?php
include 'mysqli_connect.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contestant's List</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <link rel="stylesheet" href="list.css">
  </head>
  <body>




    <div class="search-user">
    <form action="search.php" method="POST">
        <input type="text" name="search" placeholder="Search">
        <button type="submit" name="submit-search"><i class="fa fa-search" aria-hidden="true"></i></button>
      </form>

  </div>


<div class="container">
  <div class="list">
<ul>

  <li><h1>Latest Reviews</h1></li>

  <?php
    $sql = "SELECT * FROM applicants ORDER BY id DESC";
    $result = mysqli_query($con, $sql);
    $queryResult = mysqli_num_rows($result);

  if ($queryResult > 0) {
      while ($row = mysqli_fetch_assoc($result)){
        echo "<a href='article.php?eid=".$row['eid']."&reviewtype=".$row['reviewtype']."&title=".$row['title']."&venue=".$row['venue']."&day_select=".$row['day_select']."&select_month=".$row['select_month']."&year=".$row['year']."'>

      <li><span>Name:&nbsp;".$row['first_name']."&nbsp;".$row['last_name']." <br> <br>Voice Type:&nbsp;".$row['voice_type']."/".$row['year']."<br> Opera Title: ".$row['title']."<br>Venue/Publisher: ".$row['venue']." <br>Score: <br> ".$row['like_count']." Stars! <br> ".$row['dislike_count']." Eggs!</span></li>

    </a><br>";

    }
    }

    ?>

  <br>
  <li><a href="#top"> <span> Back to top </span> </a></li>
  <br>

</ul>
</div>
</div>


  </body>

</html>
