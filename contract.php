<?php
include "config.php";
include 'mysqli_connect.php';
// $sql = "SELECT * FROM applicants WHERE appID = ( SELECT MAX(appID) FROM applicants)";

$id = (int)$_GET['appID'];
$sql = "SELECT * FROM applicants WHERE appID = '$id'";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contract</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

    <style type="text/css">
        h4 {
            display: inline-block;
            text-align: center; 
            margin: 5px;
            color: white;
                }
        h4 span { 
            background-color: blue; 
            margin: 5px;
            padding: 5px;
        }
        h4:hover 
        {
            cursor: pointer;
            color: red;
            
        }
        a 
        {
            color: white;
            text-decoration: none;
        }
        a:hover 
        {
            color: red;
        }
    </style>
</head>
<body>
<img style="height: 60px;" src="images/sponsor2.jpg" alt="">

<?php
    // if(isset($_POST['btn_pdf']))
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
echo "<p>".$lang['cont1']."
".$row['first_name']."&nbsp;".$row['last_name']."<br><br>
".$lang['cont2']."Address: ".$row['address'].", ".$row['city'].", ".$row['postcode'].", ".$row['country']."<br><br>".$lang['cont3']."

</p>";}}
?>
<h4 onclick="window.print();"> <span><?php echo $lang['cont4'] ?></span> </h4>&nbsp;&nbsp;<h4><span><a href="index.php"><?php echo $lang['menu1'] ?></a></span></h4>
</body>
</html>
